const hasSubmenu = document.getElementsByClassName('has-submenu')
const adminSlideoutBtn = document.getElementById('admin-slideout-btn')

adminSlideoutBtn.onclick = function () {
    this.classList.toggle('is-active');
    document.getElementById('manage-left-nav').classList.toggle('is-active');
}

for (var i = 0; i < hasSubmenu.length; i++) {

    if (hasSubmenu[i].classList.contains('is-opened')) {
        const submenu = hasSubmenu[i].nextElementSibling
        submenu.style.maxHeight = submenu.scrollHeight + "px"
        submenu.style.marginBottom = "0.75em"
        submenu.style.marginTop = "0.75em"
    }

    var element = hasSubmenu[i]
    element.onclick = function() {
        const submenu = this.nextElementSibling
        if (submenu.style.maxHeight) {
            submenu.style.maxHeight = null
            submenu.style.marginTop = null
            submenu.style.marginBottom = null
        } else {
            submenu.style.maxHeight = submenu.scrollHeight + "px"
            submenu.style.marginBottom = "0.75em"
            submenu.style.marginTop = "0.75em"
        }
    }
}