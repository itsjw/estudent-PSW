window.collections = function() {
    var images = document.images;
    var links = document.links;
    var forms = document.forms;
    var anchors = document.anchors;

    document.getElementById("collections").innerHTML =
        "na stronie: \n" +
        "obrazkow: " + images.length + "\n" +
        "linkow: " + links.length + "\n" +
        "formularzy: " + forms.length + "\n" +
        "kotwic: " + anchors.length

    console.log(links.namedItem('strona_glowna').valueOf())
}
