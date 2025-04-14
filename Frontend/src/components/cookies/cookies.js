class Cookies {
    static getCookie(cname) {
        let name = cname + "=";
        let ca = document.cookie.split(';');
        for(let i = 0; i < ca.length; i++) {
          let c = ca[i];
          while (c.charAt(0) == ' ') {
            c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
          }
        }
        return "";
    }

    static setCookie(name, value, attributes = {}) {
        attributes = {
          path: '/',
          // agregar otros valores predeterminados si es necesario
          ...attributes
        };
      
        if (attributes.expires instanceof Date) {
          attributes.expires = attributes.expires.toUTCString();
        }
      
        let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);
      
        for (let attributeKey in attributes) {
          updatedCookie += "; " + attributeKey;
          let attributeValue = attributes[attributeKey];
          if (attributeValue !== true) {
            updatedCookie += "=" + attributeValue;
          }
        }
      
        document.cookie = updatedCookie;
    }

    static deleteCookie(name) {
        this.setCookie(name, "", {
          'max-age': -1
        })
    }

    static setLoginCookies(user) {
        this.setCookie("id",user.id);
        this.setCookie("email",user.email);
        this.setCookie("name",user.name);
        this.setCookie("surname",user.surname);
        this.setCookie("jwtToken",user.jwtToken)
    }

    static removeLoginCookies() {
        this.deleteCookie("id");
        this.deleteCookie("email");
        this.deleteCookie("name");
        this.deleteCookie("surname");
        this.deleteCookie("jwtToken");
    }
}