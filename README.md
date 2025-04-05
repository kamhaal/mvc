# MVC Webbapplikation – kmom02

## Beskrivning

Detta är en webbapplikation utvecklad med MVC-arkitektur (Model-View-Controller). Syftet är att strukturera upp koden tydligt, med en separation mellan logik (Model), visning (View) och kontroller (Controller).

## Mappstruktur och innehåll

### 1. `assets/`

**Innehåll:** CSS, JavaScript, bilder\
**Syfte:** Användargränssnitt och design

### 2. `bin/`

**Innehåll:** Symfony- och hanteringsscript\
**Syfte:** Kör t.ex. migrations och kommandon

### 3. `config/`

**Innehåll:** Konfigurationer för routes, services, bundles\
**Syfte:** Styr upp applikationens uppsättning

### 4. `docs/`

**Innehåll:** Dokumentation\
**Syfte:** Information om projektets syfte och uppbyggnad

### 5. `migrations/`

**Innehåll:** Databas-migrationsfiler\
**Syfte:** Hantera förändringar i databasen

### 6. `public/`

**Innehåll:** index.php, offentliga resurser\
**Syfte:** Ingångspunkt för webbapplikationen

### 7. `src/`

**Innehåll:** Källkod, t.ex. CardGame, DiceGame\
**Syfte:** Här finns spelets logik och kontroller

### 8. `templates/`

**Innehåll:** Twig-mallar för HTML\
**Syfte:** Styr layout och presentation

### 9. `tests/`

**Innehåll:** Enhetstester\
**Syfte:** Säkerställa att funktioner fungerar korrekt

### 10. `translations/`

**Innehåll:** Språkfiler\
**Syfte:** Möjlighet till flerspråkighet

---

## Viktiga filer

- `.env` och `.env.test` – Miljöinställningar
- `.gitignore` – Filer som ignoreras av Git
- `composer.json` & `composer.lock` – PHP-paket
- `phpunit.xml.dist` – PHPUnit-konfiguration
- `webpack.config.js` – Webpack-konfiguration

---

## Syfte med projektet

Målet med projektet är att bygga upp ett tärningsspel där man:

- Utvecklar spelets logik i backend (PHP)
- Bygger upp en webbapplikation med Symfony
- Följer MVC-principer
- Lär sig använda verktyg som Git, Docker, Composer och testning med PHPUnit

---

## Kom igång

1. Klona repot:
   ```bash
   git clone https://github.com/kamhaal/mvc.git
   cd mvc
   ```

---

## Systemkrav

För att köra detta projekt behöver du:

- PHP **^8.1**
- Composer **^2.0**
- Symfony CLI (valfritt men rekommenderas)
- Node.js & npm (för frontendbygg med Webpack Encore)
- En lokal webbserver (t.ex. Apache, Nginx eller Symfony dev-server)

---

## Installation

1. Installera PHP-paket:

   ```bash
   composer install
   ```

2. Installera JavaScript-paket (om du använder Webpack Encore):

   ```bash
   npm install
   npm run dev
   ```

3. Skapa `.env.local` vid behov och anpassa miljövariabler.

4. Starta utvecklingsservern:

   ```bash
   symfony server:start
   ```

   *eller* via PHP:

   ```bash
   php -S localhost:8000 -t public
   ```

5. Besök `http://localhost:8000` i din webbläsare.

---