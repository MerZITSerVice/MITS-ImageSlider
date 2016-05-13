# MITS-ImageSlider
ImageSlider for modified eCommerce Shopsoftware

########################################################################################################

MITS ImageSlider v2.01 für modified eCommerce Shopsoftware
(c) Copyright 2008-2016 by Hetfield - MerZ IT-SerVice

Author: 	Hetfield - https://www.merz-it-service.de

Version: 	modified eCommerce Shopsoftware ab der Version 2.0.0 rev 9678

Original nur von hier: https://www.merz-it-service.de/Installation-Imageslider-v1-5::74.html

########################################################################################################


########################################################################################################

Lizenzinformationen:
--------------------------------------------------------------------------------------------------------
Diese Erweiterung ist unter der GNU/GPL lizensiert. Eine Kopie der Lizenz liegt diesem Modul bei 
oder kann unter der URL http://www.gnu.org/licenses/gpl-2.0.txt heruntergeladen werden. Die 
Copyrighthinweise müssen erhalten bleiben, bzw. mit eingebaut werden. Zuwiderhandlungen verstoßen 
gegen das Urheberrecht und die GPL und werden zivil- und strafrechtlich verfolgt!

########################################################################################################

Anleitung für das Modul MITS ImageSlider v2.01
========================================================================================================

Sie finden die aktuellste Installationsanleitung unter http://imageslider.merz-it-service.de/readme.html


1. Installation
--------------------------------------------------------------------------------------------------------
Systemvoraussetzung: Funktionsfähige modified eCommerce Shopsoftware ab der Version 2.0.0 rev 9678

Vor der Installation des Moduls sichern sie bitte komplett ihre aktuelle Shopinstallation (Dateien und Datenbank)!
Für eventuelle Schäden übernehmen wir keine Haftung!
Die Installation und Nutzung des Moduls Imageslider v2.01 erfolgt auf eigene Gefahr!

Die Installation des Modul Imageslider v2.01 ist in der aktuellen Shopversion 2.0.0 ziemlich einfach.

  1. Wenn ihr Template bereits Anpassung für den Imageslider v1.5 enthalten hat, so entfernen Sie 
     bitte diese Anpassungen vor der Installation! Dazu müssen Sie nur die Anweisungen für die 
     Templateanpassungen aus der Installationsanleitung für die Version v1.5 rückgängig machen.

  2. Falls der admin-Order des Shops unbenannt wurde, dann entsprechnd auch den Ordner admin 
     im Verzeichns shoproot des Moduls vor dem Hochladen ebenfalls entsprechend umbenennen!

  3. Kopieren Sie anschließend einfach alle Dateien in dem Verzeichnis shoproot aus dem Modulpaket 
     MITS_ImageSlider_v2.01 in das Hauptverzeichnis ihrer bestehenden 
     modified eCommerce Shopsoftware 2.0.0 Installation. Es werden dabei keine Dateien überschrieben!

  4. Nachdem sie alle Dateien in den Shop übertragen haben melden sie sich bitte im Shop mit einem 
     gültigen Adminzugang an, der die Berechtigung besitzt auch Systemmodule zu installieren.

  5. Wechseln sie in den Administrationsbereich und rufen sie den Menüpunkt Module -> System-Module auf.

  6. Markieren sie dort den Eintrag Imageslider v2.01 © by Hetfield (MerZ IT-SerVice) und klicken sie dann 
     auf der rechten Seite auf den Button Installieren. Das Modul wird nun komplett installiert. 
     Sollten sie von einer früheren Version 1.5 updaten, erledigt der Installer des Moduls die Anpassung 
     der Datenbank komplett für sie.

  7. Konfigurieren sie nun das Modul nach ihren Wünschen. Die verschiedenen Einstellmöglichkeiten sind im Modul erklärt.

  8. Rufen sie den Menüpunkt Hilfsprogramme -> MITS ImageSlider v2.01 auf. 
     Dort können sie Einträge anlegen, bearbeiten oder löschen.




2. Den ImageSlider v2.01 im Template verfügbar machen
--------------------------------------------------------------------------------------------------------
Um einen ImageSlider im Template anzuzeigen gibt es in der neuen Version verschiedene Möglichkeiten.

Variante 1: Per Smarty-Variable in der index.html des verwendeten Templates

Fügen Sie für den Aufruf des Standard-ImageSlider-Gruppe MITS_IMAGESLIDER einfach folgende 
Smarty-Variable an die gewünschte Stelle in ihrer index.html ein:

        {if isset($MITS_IMAGESLIDER)}{$MITS_IMAGESLIDER}{/if}
        

Möchten sie z.B. eine andere ImageSlider-Gruppe anzeigen lassen, dann fügen Sie für den Aufruf der 
anderen ImageSlider-Gruppe (in diesem Beispiel mit dem Gruppennamen ANDRER_IMAGESLIDER) einfach 
folgende Smarty-Variable an die gewünschte Stelle in ihrer index.html ein:

        {if isset($ANDERER_IMAGESLIDER)}{$ANDERER_IMAGESLIDER}{/if}
        

Verwenden Sie das Slider-Plugin "NivoSlider", dann stehen ihnen insgesamt 4 verschieden Themes (Designs) 
zur Auswahl. Folgende 4 Themes stehen ihnen beim NivoSlider zur Verfügung:

    - theme-bar
    - theme-dark
    - theme-default (Standard-Theme, kein besondere Aufruf notwendig)
    - theme-light

Diese können Sie durch Anpassung der Smarty-Variable per replace-Befehl wechseln. 
Im folgenden Beispiel wird das Theme von theme-default auf theme-bar gewechselt:

        {if isset($MITS_IMAGESLIDER)}
           {$MITS_IMAGESLIDER|replace:'slider-wrapper theme-default':'slider-wrapper theme-bar'}
        {/if}
        

Hier ein weiteres Beispiel, diesmal wird das Theme von theme-default auf theme-light gewechselt:

        {if isset($ANDERER_IMAGESLIDER)}
           {$ANDERER_IMAGESLIDER|replace:'slider-wrapper theme-default':'slider-wrapper theme-light'}
        {/if}
        

Sie können die Einstellung des ImagSlider-Moduls zur Anzeige start (nur auf der Startseite verfügbar) 
auch anders lösen. Stellen sie dazu die Anzeigedes Imagesliders auf general um. Anschließend können Sie 
dann zur Beschränkung der Anzeige auf die Startseite auch folgenden Smarty-Code in der index.html verwenden:

        {if strstr ($smarty.server.PHP_SELF, 'index')}
            {if $smarty.get.cPath==null and $smarty.get.manufacturers_id==''}
                {if isset($MITS_IMAGESLIDER)}
                    {$MITS_IMAGESLIDER|replace:'slider-wrapper theme-default':'slider-wrapper theme-dark'}
                {/if}
            {/if}
        {/if}
        

Variante 2: Als Smarty-Plugin überall im Template verwenden

Neu im ImageSlider v2.01 ist die Nutzung des ImageSliders alsSmarty-Plugin. Damit können Sie den ImageSlider 
in jeder beliebigen HTML-Template-Datei aufrufen. Vorraussetzung dafür ist die Einstellung der Anzeigeart general. 
Der Standardaufruf mit der Gruppe MITS_IMAGESLIDER sieht wie folgt aus:

        {getImageSlider slidergroup=mits_imageslider}
        

Der Aufruf mit einer anderen Gruppe (hier z.B. die ImageSlider-Gruppe ANDERER_IMAGESLIDER) sieht wie folgt aus:

        {getImageSlider slidergroup=anderer_imageslider}
        

Durch die Erweiterung des Aufrufs um den Parameter nivotheme können sie bei der Verwendung 
des Slider-Plugins "NivoSlider" das Theme wechseln. 
Im folgenden Beispiel wird das Theme von theme-default auf theme-bar gewechselt:

        {getImageSlider slidergroup=mits_imageslider nivotheme=theme-bar}
        

Hier ein weiteres Beispiel, diesmal wird das Theme von theme-default auf theme-dark gewechselt:

        {getImageSlider slidergroup=anderer_imageslider nivotheme=theme-dark}
        



3. Fertig
--------------------------------------------------------------------------------------------------------
Wir hoffen, der neue MITS ImageSlider v2.01 für die modified eCommerce Shopsoftware 2.0.0 gefällt ihnen! 
Benötigen sie Unterstützung bei der indivduellen Anpassung des Modul oder haben sie eventuell doch Probleme beim Einbau? 
Gerne können sie unseren kostenpflichtigen Support in Anspruch nehmen. 
Kontaktieren sie uns einfach unter info@merz-it-service.de



--------------------------------------------------------------------------------------------------------

MerZ IT-SerVice

Nicole Grewe - Am Berndebach 35a - D-57439 Attendorn

Telefon: 0 27 22 - 63 13 63 - Telefax: 0 27 22 - 63 14 00

E-Mail: Info(at)MerZ-IT-SerVice.de - Internet: www.MerZ-IT-SerVice.de

--------------------------------------------------------------------------------------------------------
