function showTeam(evt, team) {
  // Declare all variables
  var i, results__team, results__tab;

  // Get all elements with class="results__team" and hide them
  results__team = document.getElementsByClassName('results__team');
  for (i = 0; i < results__team.length; i++) {
    results__team[i].style.display = 'none';
  }

  // Get all elements with class="results__tab" and remove the class "active"
  results__tab = document.getElementsByClassName('results__tab');
  for (i = 0; i < results__tab.length; i++) {
    results__tab[i].className = results__tab[i].className.replace(' active', '');
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(team).style.display = 'block';
  evt.currentTarget.className += ' active';
}

const teamTabs = document.querySelectorAll('.results__tab');

if (teamTabs) {
  teamTabs.forEach(function(tab) {
    tab.addEventListener('click', function(evt) {
      showTeam(evt, tab.dataset.team);
    });

    if (tab.id === 'defaultOpen') {
      tab.click();
    }
  });
    
}
