let cookies = {
  firstName: {
    class: 'cookies-first-name',
    cookieID: 'user-first-name',
    get cookie(){
      return getCookie(this.cookieID);
    }
  },
  lastName: {
    class: 'cookies-last-name',
    cookieID: 'user-last-name',
    get cookie(){
      return getCookie(this.cookieID);
    }
  },
  email: {
    class: 'cookies-email',
    cookieID: 'user-email',
    get cookie(){
      return getCookie(this.cookieID);
    }
  },
  company: {
    class: 'cookies-company',
    cookieID: 'user-company',
    get cookie(){
      return getCookie(this.cookieID);
    }
  },
  phone: {
    class: 'cookies-phone',
    cookieID: 'user-phone',
    get cookie(){
      return getCookie(this.cookieID);
    }
  },
  jobTitle: {
    class: 'cookies-job-title',
    cookieID: 'user-job-title',
    get cookie(){
      return getCookie(this.cookieID);
    }
  }
};

const hasValue = (input) => {
  if (input.value === '') { return false; } else { return true; }
};

function populate() {
  const forms = document.querySelectorAll('form');
  // Across all forms
  forms.forEach((form) => {
    const inputs = form.querySelectorAll('input');
    // And for each input in a form
    inputs.forEach((input) => {
      // Look at each cookie we track
      for (var property in cookies) {
        // Test inputs classes against the cookie
        if (input.classList.contains(cookies[property].class)) {
          // console.log('has class: ' + cookies[property].class);
          // Add cookie's value to input
          input.value = cookies[property].cookie;
        }
      }
    });
  });
};

function getCookie(cname) {
  var name = cname + '=';
  var ca = document.cookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ')
      c = c.substring(1);
    if (c.indexOf(name) == 0)
      return c.substring(name.length, c.length);
  }
  return '';
};

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = 'expires=' + d.toUTCString();
  document.cookie = cname + '=' + cvalue + ';' + expires + ';path=/';
};

function setCookies(target) {
  // console.log('Set cookies');
  const inputs = target.querySelectorAll('input');
  // For each input in a form submission
  inputs.forEach((input) => {
    // Look at each cookie we track
    for (var property in cookies) {
      // Test inputs classes against the cookie and make sure it has a value
      if (input.classList.contains(cookies[property].class) && hasValue(input)) {
        // Set the cookie
        setCookie(cookies[property].cookieID, input.value, 30);
      }
    }
  });
}

populate();

export default {
  setCookies: setCookies,
  hasValue: hasValue
};