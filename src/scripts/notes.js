/*global window*/
/*global document*/

(function (window, document) {
    "use strict";

    var count = 0;

    window.submitForm = submitForm;
    window.enter = enter;

    document.writeln("dynamicznie dodany text");

    window.addEventListener("click", function () {
        document.getElementById("counter").innerHTML = "counter: " + count++;
    });

    window.onload = function () {
        window.collections()
        showNotes();
        document.getElementById("lucky-number").innerHTML = "szczesliwy numer to " + parseInt(Math.floor(Math.random() * 100));
        document.getElementById('submit-form').addEventListener("mousemove", window.mouseOver)
        document.getElementById('submit-form').addEventListener("mouseleave", window.mouseLeave)

        var form = document.getElementsByClassName("noteForm")[0];
        form.addEventListener("focus", function( event ) {
            event.target.style.background = "lightcyan";
        }, true);
        form.addEventListener("blur", function( event ) {
            event.target.style.background = "";
        }, true);
    };

    function submitForm() {
        var title = getValueOf("title");
        var content = getValueOf("content");

        if (!title || !content) {
            var text = window.prompt("Prosze wypelnić wszystkie pola. Tytuł = ");
            document.getElementById("title").value = text;
            return false;
        }

        var note = {title: title, content: content, date: (new Date()).toDateString()};

        var notes = getFromLocalStorage("notes");
        notes.push(note);
        setToLocalStorage("notes", notes);
        addNote(note);
        window.alert("Pomyślnie dodano notatke!");
    }

    function getValueOf(id) {
        return document.getElementById(id).value;
    }

    function getFromLocalStorage(name) {
        var data = window.localStorage.getItem(name);
        return data ? JSON.parse(data) : [];
    }

    function setToLocalStorage(name, data) {
        data = JSON.stringify(data);
        window.localStorage.setItem(name, data);
    }

    function showNotes() {
        var notes = getFromLocalStorage("notes");
        notes.forEach(addNote);
    }

    function addNote(note) {
        var $notesList = document.getElementById("notes-list");
        var $child = document.createElement("div");

        var $title = document.createElement("span");
        $title.innerHTML = "Tytuł: " + note.title;

        var $date = document.createElement("span");
        $date.id = "date";
        $date.innerHTML = note.date;

        var $content= document.createTextNode("Zawartość: " + note.content);

        var $plug = document.createElement("plug");
        $plug.innerHTML = "PLUGPLUGPLUGPLUG"

        $title = $child.appendChild($title);
        $child.insertBefore($plug, $title);
        $child.replaceChild($date, $plug)
        $child.appendChild($content);
        $child.appendChild($plug)
        $child.removeChild($plug)

        $title.parentNode.appendChild(document.createTextNode("."))

        $notesList.appendChild($child);
    }

    function enter(event) {
        if(event.ctrlKey && event.key === 'Enter')
            submitForm()
    }

})(window, document);

// https://eslint.org/docs/about/ TODO LINER
