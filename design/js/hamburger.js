/* Author: Milan Turyna ; Usage:
add js--hamburger to your hamburger button, set id for navigation content in data-navigation
 */
const Hamburger = {
    openedIcon: "ri-menu-line",
    closedIcon: "ri-close-line",
    start: () => {
        [...document.getElementsByClassName("js--hamburger")].forEach((el) => {
            let navContent = document.getElementById(el.dataset.navigation)
            navContent.style.display = "none"
            el.classList.add(Hamburger.openedIcon)
            el.addEventListener("click", () => {
                if(navContent.style.display === "none") {
                    el.classList.remove(Hamburger.openedIcon)
                    el.classList.add(Hamburger.closedIcon)
                    navContent.style.display = "block"
                } else {
                    el.classList.remove(Hamburger.closedIcon)
                    el.classList.add(Hamburger.openedIcon)
                    navContent.style.display = "none"
                }
            })
        })
    }
}
Hamburger.start();