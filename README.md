# MVC Webbapplikation – kmom02

## Beskrivning

Detta är en webbapplikation utvecklad med MVC-arkitektur (Model-View-Controller). Syftet är att strukturera upp koden tydligt, med en separation mellan logik (Model), visning (View) och kontroller (Controller).

## Mappstruktur och innehåll

### 1. `assets/`
**Innehåll:** CSS, JavaScript, bilder  
**Syfte:** Användargränssnitt och design

### 2. `bin/`
**Innehåll:** Symfony- och hanteringsscript  
**Syfte:** Kör t.ex. migrations och kommandon

### 3. `config/`
**Innehåll:** Konfigurationer för routes, services, bundles  
**Syfte:** Styr upp applikationens uppsättning

### 4. `docs/`
**Innehåll:** Dokumentation  
**Syfte:** Information om projektets syfte och uppbyggnad

### 5. `migrations/`
**Innehåll:** Databas-migrationsfiler  
**Syfte:** Hantera förändringar i databasen

### 6. `public/`
**Innehåll:** index.php, offentliga resurser  
**Syfte:** Ingångspunkt för webbapplikationen

### 7. `src/`
**Innehåll:** Källkod, t.ex. CardGame, DiceGame  
**Syfte:** Här finns spelets logik och kontroller

### 8. `templates/`
**Innehåll:** Twig-mallar för HTML  
**Syfte:** Styr layout och presentation

### 9. `tests/`
**Innehåll:** Enhetstester  
**Syfte:** Säkerställa att funktioner fungerar korrekt

### 10. `translations/`
**Innehåll:** Språkfiler  
**Syfte:** Möjlighet till flerspråkighet

---

## Viktiga filer

- `.env` och `.env.test` – Miljöinställningar
- `.gitignore` – Filer som ignoreras av Git
- `composer.json` & `composer.lock` – PHP-paket
- `phpunit.xml.dist` – PHPUnit-konfiguration
- `webpack.config.js` – Webpack-konfiguration

---
