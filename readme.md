Aplikacja webowa PSW - L.

lista 1 zagadnienia:
    1.a) kiedy wpisujemy dane w formularzu aplikacja sprawdza czy dane te sa prawidłowe. jeżeli są - zezwala na ich wysłanie
        w przeciwnym wypadku wyświetla powiadomienia z informacją jakie dane zostały nieprawidłowo wprowadzone.
      b) walidacja przebiega w dwóch przypadkach: //https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/HTML5/Constraint_validation
            - dla niektórych typów inputów takich jak np: email lub URL.
            - jeżeli na element zostanie nałozone ograniczenie w postaci atrybutu np. dla inputu o typie text można 
                nałożyć ograniczenie takie jak pattern, required, maxlength
        aby wymusić brak walidacji należy dodać atrybut novalidate do wskazanego elementu lub calego formularza.
    2. input z typem date w różnych przeglądarkach udostępnia inny interfejs
        - https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/date#Browser_compatibility //yyyy-mm-dd
    3. atrybut placeholder mozna nałożyć na takie elementy jak text, search, tel, url oraz email

edytor: Webstorm + wsparcie w przegladarce DEV_TOOLS Chromium
