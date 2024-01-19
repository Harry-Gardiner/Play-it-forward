export default class InfoBannerCookies {
    constructor(infoBanner) {
        this.state = { bannerContents: infoBanner.textContent };
        this.bindUI(infoBanner);
        this.attachEvents();
        this.onLoad();
    }

    bindUI(infoBanner) {
        this.infoBanner = infoBanner;
        this.closeButton = this.infoBanner.querySelector('.info-banner__close-btn');
    }

    attachEvents() {
        if (this.closeButton) {
            this.closeButton.addEventListener('click', this.closeBanner.bind(this));
        }
    }

    checkLocalStorage() {
        return window.localStorage.getItem('infoBanner') === this.state.bannerContents;
    }

    onLoad() {
        const bannerDismissed = this.checkLocalStorage();

        if (bannerDismissed) {
            this.infoBanner.remove();
        }
    }

    closeBanner() {
        window.localStorage.setItem('infoBanner', this.state.bannerContents);
        this.infoBanner.remove();
    }
}

