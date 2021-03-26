# Webbshop grupp 5

Route 66 - Grupp 5 (alla G krav är nu klara)

Gruppens medlemmar.
Kanan Garaisayev
Sherin Valestrand
Ryan-Phillips Cornelio
Andreas Palm Österberg

https://github.com/RyanCornelio/Webbshop

En länk dit projekt går att använda live.

Granskning: uppgifter att testa med, så som inloggningsuppgifter.

---------------------------
login: admin
password: test

 
login: u3
password: u3
---------------------------

OBS: Readme filen ska framförallt innehålla en lista över alla kraven i kravspecen nedanför samt en kort kommentar från er - har ni uppfyllt kravet? I så fall, hur?
Alla sidor skall vara responsiva. (G)

Arbetet ska implementeras med objektorienterade principer. (G)
Skapa ett konceptuellt ER diagram, detta ska lämnas in vid idégodkännandet G)
Beskriv er företagsidé i en kort textuell presentation, detta ska lämnas in vid idégodkännandet (G)

All data som programmet utnyttjar ska vara sparat i en MYSQL databas (produkter, beställningar, konton mm) (G)

Det ska finnas ett normaliserat diagram över databasen i gitrepot G)
Man ska kunna logga in som administratör i systemet (G)
Man ska kunna registrera sig som administratör på sidan, nya användare ska sparas i databasen (VG) 

En administratör behöver godkännas av en tidigare administratör innan man kan logga in fösta gången (VG)

Inga Lösenord får sparas i klartext i databasen (G)

En besökare ska kunna beställa produkter från sidan, detta ska uppdatera lagersaldot i databasen (G)

Administratörer ska kunna uppdatera antalet produkter i lager från admin delen av sidan (G)

Administratörer ska kunna se en lista på alla gjorda beställningar (G)
Administratörer ska kunna markera beställningar som skickade (VG)
Sidans produkter ska delas upp i kategorier, en produkt ska tillhöra minst en kategori, men kan tillhöra flera (G)

Från hemsidan ska man kunna se en lista över alla produkter, och man ska kunna lista bara dom produkter som tillhör en kategori (G)

Besökare ska kunna lägga produkterna i en kundkorg, som är sparad i session på servern (G)

Man ska från hemsidan kunna skriva upp sig för att få butikens nyhetsbrev genom att ange sitt namn och epostadress (G)

När man gör en beställning ska man också få chansen att skriva upp sig för nyhetsbrevet (VG).

När besökare gör en beställning ska hen få ett lösenord till sidan där man kan logga in som kund. Det är ok att spara all kundinformation i användartabellen, ni behöver alltså inte ha en separat costumer tabell om inloggning finns (VG)
När man är inloggad som kund ska man kunna se sina gjorda beställning och om det är skickade eller inte (VG)

Som inloggad kund ska man kunna markera sin beställning som mottagen (VG)
Administratörer ska kunna se en lista över personer som vill ha nyhetsbrevet och deras epost adresser (G)

Besökare ska kunna välja ett av flera fraktalternativ (G)

Tillgängliga fraktalternativ ska vara hämtade från databasen (G)

Administratörer ska kunna redigera vilka kategorier en produkt tillhör (VG)
Administratörer ska kunna skicka nyhetsbrev från sitt gränssnitt, nyhetsbrevet ska sparas i databasen samt innehålla en titel och en brödtext (VG)

Administratörer ska kunna lägga till och ta bort produkter (VG)
