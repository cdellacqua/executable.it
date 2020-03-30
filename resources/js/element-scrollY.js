window.elementScrollY = function (element) {
    let scrollY = 0;
    while (element) {
        scrollY += element.offsetTop;
        element = element.offsetParent;
    }
    return scrollY;
};
