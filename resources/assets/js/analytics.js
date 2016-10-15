(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-85756933-1', 'auto');
ga('send', 'pageview');

function sendGaEvent(action, label, number, callback) {
  if (label && number && callback) {
    ga('send', 'event', {
      eventCategory: 'ButtonClick',
      eventAction: action,
      eventLabel: label,
      eventValue: number,
      hitCallback: callback
    });
  } else if (label && number) {
    ga('send', 'event', {
      eventCategory: 'ButtonClick',
      eventAction: action,
      eventLabel: label,
      eventValue: number
    });
  } else if(label) {
    ga('send', 'event', {
      eventCategory: 'ButtonClick',
      eventAction: action,
      eventLabel: label
    });
  } else {
    ga('send', 'event', {
      eventCategory: 'ButtonClick',
      eventAction: action
    });
  }
}
