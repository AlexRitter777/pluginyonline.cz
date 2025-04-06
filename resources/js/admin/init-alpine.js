import {focusTrap} from "../admin/focus-trap.js";


export default () => ({

    dark: getCurrentTheme(),
    toggleTheme() {
      this.dark = !this.dark
      setThemeToLocalStorage(this.dark)
    },
    isSideMenuOpen: false,
    toggleSideMenu() {
      this.isSideMenuOpen = !this.isSideMenuOpen
    },
    closeSideMenu() {
      this.isSideMenuOpen = false
    },
    isNotificationsMenuOpen: false,
    toggleNotificationsMenu() {
      this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
        console.log(this.isNotificationsMenuOpen);
    },
    closeNotificationsMenu() {
      this.isNotificationsMenuOpen = false
    },
    isProfileMenuOpen: false,
    toggleProfileMenu() {
      this.isProfileMenuOpen = !this.isProfileMenuOpen
    },
    closeProfileMenu() {
      this.isProfileMenuOpen = false
    },
    isPagesMenuOpen: false,
    togglePagesMenu() {
      this.isPagesMenuOpen = !this.isPagesMenuOpen
    },
    deleteItemConfirmation: false,
    closeDeleteItemConfirmation() {
        this.deleteItemConfirmation = false;
    }


  });

function getThemeFromLocalStorage() {
  // if user already changed the theme, use it
  if (window.localStorage.getItem('dark')) {
    return JSON.parse(window.localStorage.getItem('dark'))
  }

  // else return their preferences
  return (
    !!window.matchMedia &&
    window.matchMedia('(prefers-color-scheme: dark)').matches
  )
}

function setThemeToLocalStorage(value) {
  window.localStorage.setItem('dark', value)
}

function getCurrentTheme(){
    return document.documentElement.classList.contains('dark');
}




