# Shopland
Caratteristiche principali:

Gestione Annunci:
Gli utenti registrati possono inserire annunci con titolo, prezzo, descrizione, categoria e immagini multiple. L’inserimento e la gestione degli annunci sono realizzati tramite componenti Livewire per un’esperienza dinamica e reattiva.

Ricerca e Filtri:
Annunci ricercabili tramite full-text su titolo, descrizione e categoria. Implementato filtro per prezzo in tempo reale con Laravel Livewire per una ricerca rapida e mirata (extra).

Gestione Immagini:
Upload multiplo, preview e rimozione immagini. Supporto per crop automatico asincrono, watermark personalizzato e oscuramento volti per la privacy. Integrazione con Google Vision API per analisi automatica dei contenuti.

Autenticazione avanzata:
Sistema di autenticazione gestito con Laravel Fortify, aggiornato per includere l’upload dell’immagine profilo in fase di registrazione (extra). Accesso disponibile anche tramite Google OAuth per massima flessibilità (extra).

Gestione Revisori:
Workflow dedicato per revisori, con sezione privata, lista annunci da moderare, possibilità di accettare/rifiutare e annullare l’ultima azione. Richiesta ruolo revisore tramite form con invio email automatizzato.

Internazionalizzazione:
UI multilingua (italiano/inglese) con selezione rapida tramite flag.

UI/UX:
Layout responsive, immagini uniformi, navbar dinamica e feedback visivo su tutte le operazioni principali. Asset gestiti con Vite e Bootstrap.

Extra implementati:

Filtro per prezzo in tempo reale con Livewire

Upload immagine profilo in fase di registrazione (Laravel Fortify)

Login tramite Google OAuth