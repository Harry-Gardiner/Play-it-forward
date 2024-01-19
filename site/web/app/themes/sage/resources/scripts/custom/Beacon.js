
! function (e, t) {
    if (!e.getElementById(t)) {
        var c = e.createElement("script");
        c.id = t, c.src = "https://static.beaconproducts.co.uk/js-sdk/production/beaconcrm.min.js", e
            .getElementsByTagName("head")[0].appendChild(c)
    }
}(document, "beacon-js-sdk")
