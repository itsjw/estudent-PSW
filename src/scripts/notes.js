/*global window*/
/*global document*/

(function (window, document) {
    "use strict";

    var count = 0;

    window.submitForm = submitForm;

    document.writeln("dynamicznie dodany text");

    window.addEventListener("click", function () {
        document.getElementById("counter").innerHTML = "counter: " + count++;
    });

    window.onload = function () {
        showNotes();
        document.getElementById("lucky-number").innerHTML = "szczesliwy numer to " + parseInt(Math.floor(Math.random() * 100));
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

        var $content = document.createElement("span");
        $content.innerHTML = "Zawartość: " + note.content;

        $child.appendChild($title);
        $child.appendChild($date);
        $child.appendChild($content);
        $notesList.appendChild($child);
    }

})(window, document);

// https://eslint.org/docs/about/ TODO LINER
