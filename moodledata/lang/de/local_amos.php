<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'local_amos', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   local_amos
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['about'] = '<p>AMOS bedeutet <b>Automated Manipulation Of Strings</b> und steht für die automatisierte Bearbeitung und Verwaltung der Moodle-Sprachpakete.</p>
<p>AMOS ist das zentrale Repository für die Moodle-Texte. AMOS protokolliert alle Veränderungen bei den englischen Originaltexten und ermöglicht die Übersetzung in die jeweiligen Sprachen. AMOS koordiniert die gemeinschaftliche Übersetzung und erzeugt die offiziellen Sprachpakete automatisch.</p>
<p>Weitere Informationen: <a href="http://docs.moodle.org/en/AMOS">AMOS documentation</a></p>';
$string['amos'] = '<h2>AMOS - Werkzeug zur Moodle-Übersetzung</h2>';
$string['amos:commit'] = 'Texte aus dem Arbeitsspeicher ins Sprachpaket übertragen';
$string['amos:execute'] = 'Vorgegebenes AMOScript ausführen';
$string['amos:importfile'] = 'Übersetzung hochladen und im Arbeitsspeicher zeigen';
$string['amos:importstrings'] = 'Übersetzte Texte (inclusive der englischen Originale) in das Hauptrepository importieren';
$string['amos:manage'] = 'AMOS-Portal verwalten';
$string['amos:stage'] = 'Texte im Arbeitsspeicher übersetzen';
$string['amos:stash'] = 'Arbeitsspeicher in einer Ablage sichern';
$string['amos:usegoogle'] = 'Mit Google übersetzen';
$string['commitbutton'] = 'Übernehmen und Arbeitsspeicher leeren';
$string['commitbutton2'] = 'Übernehmen und Arbeitsspeicher behalten';
$string['commitmessage'] = 'Mitteilung';
$string['commitstage'] = 'Arbeitsspeicher ins Sprachpaket übertragen';
$string['commitstage_help'] = 'Alle Übersetzungen werden aus dem Arbeitsspeicher in das AMOS Repository gespeichert und ins Sprachpaket übertragen. Alle übertragbaren Übersetzungen sind in der Übersicht grün unterlegt. Der Arbeitsspeicher wird anschließend geleert.';
$string['committableall'] = 'Alle Sprachen';
$string['committablenone'] = 'Keine Sprache erlaubt - wenden Sie sich an den AMOS-Verwalter';
$string['componentsall'] = 'Alle';
$string['componentsnone'] = 'Keine';
$string['componentsstandard'] = 'Standard';
$string['confirmaction'] = 'Möchten Sie diesen Vorgang wirklich ausführen?';
$string['contribaccept'] = 'Akzeptieren';
$string['contribactions'] = 'Bereitgestellte Übersetzungen';
$string['contribactions_help'] = 'Abhängig von Ihren Rechten und dem Arbeitsablauf haben Sie folgende Möglichkeiten:

* Aufnehmen - Kopieren Sie die eingesandte Übersetzung in Ihren Arbeitsspeicher, wobei nichts verändert wird.
* Mir zuweisen - sich selber als Prüfer eintragen, um die eingesandte Übersetzung zu prüfen und ins Sprachpaket einzubinden
* Weiterleiten - jemand anders zur Prüfung zuweisen
* Prüfung beginnen - Weisen Sie den neuen Beitrag zu sich selbst, setzen Sie den Status auf "In Bearbeitung" und kopieren Sie die eingereichten Übersetzung in Ihre Bühne
* Akzeptieren - markieren Sie die Beitrag als akzeptiert
* Ablehnen - markieren den Beitrag als abgelehnt. Bitte schreiben Sie die Gründe in einem Kommentar.

Der Einsender wird per E-Mail informiert, wenn sich der Status seines Beitrags ändert.';
$string['contribapply'] = 'Aufnehmen';
$string['contribassignee'] = 'Prüfer/in';
$string['contribassigneenone'] = '-';
$string['contribassigntome'] = 'Mir zuweisen';
$string['contribauthor'] = 'Autor/in';
$string['contribclosedno'] = 'Erledigte Vorschläge verbergen';
$string['contribclosedyes'] = 'Erledigte Vorschläge anzeigen';
$string['contribcomponents'] = 'Komponenten';
$string['contribid'] = 'ID';
$string['contribincomingnone'] = 'Keine gegangenen Vorschläge';
$string['contribincomingsome'] = 'Eingegangene Vorschläge ({$a})';
$string['contriblanguage'] = 'Sprache';
$string['contribreject'] = 'Ablehnen';
$string['contribresign'] = 'Weiterleiten';
$string['contribstaged'] = 'Vorschlag im Arbeitsspeicher <a href="contrib.php?id={$a->id}">#{$a->id}</a> von {$a->author}';
$string['contribstagedinfo'] = 'Vorschlag im Arbeitsspeicher';
$string['contribstagedinfo_help'] = 'Die Texte im Arbeitsspeicher wurden von einem  Mitglied der Community vorgeschlagen. Die Betreuer des Sprachpakets sollen die Übersetzung prüfen. Die Texte erhalten den Status \'akzeptiert\' und werden ins Sprachpaket übernommen. Oder sie werden \'abgelehnt\', weil sie aus irgendeinem Grund nicht akzeptiert werden können.';
$string['contribstartreview'] = 'Prüfung beginnen';
$string['contribstatus'] = 'Status';
$string['contribstatus0'] = 'Neu';
$string['contribstatus10'] = 'In Bearbeitung';
$string['contribstatus20'] = 'Abgelehnt';
$string['contribstatus30'] = 'Akzeptiert';
$string['contribstatus_help'] = 'Die Arbeitsphasen einer eingesandten Übersetzung sehen folgendermaßen aus:

* Neu - der Vorschlag wurde eingereicht, wartet aber noch auf seine Überprüfung
* In Bearbeitung - der Vorschlag wurde einem Betreuer des Sprachpakets zugewiesen und wird gerade bearbeitet
* Abgelehnt - ein Betreuer des Sprachpakets hat den Vorschlag abgelehnt und wahrscheinlich einen klärenden Kommentar geschrieben
* Akzeptiert - der Vorschlag wurde akzeptiert und ins Sprachpaket eingebunden';
$string['contribstrings'] = 'Texte';
$string['contribstringseq'] = '{$a->orig} neu';
$string['contribstringsnone'] = '{$a->orig} (alle Texte sind übersetzt)';
$string['contribstringssome'] = '{$a->orig} (für {$a->same} Texte existiert eine neuere Übersetzung)';
$string['contribsubject'] = 'Betreff';
$string['contribsubmittednone'] = 'Keine eingesandten Vorschläge';
$string['contribsubmittedsome'] = 'Ihre Vorschläge ({$a})';
$string['contribtimemodified'] = 'Geändert';
$string['contributions'] = 'Vorschläge';
$string['diff'] = 'Vergleichen';
$string['diffmode'] = 'Suche';
$string['diffmode1'] = 'Englische Texte wurden gerändert, aber nicht die Übersetzung';
$string['diffmode2'] = 'Englische Texte wurden nicht gerändert, aber die Übersetzung';
$string['diffmode3'] = 'Entweder wurden englische Texte oder die Übersetzung geändert (aber nicht beides)';
$string['diffmode4'] = 'Sowohl englische Texte wie auch die Übersetzung wurden geändert';
$string['diffprogress'] = 'Ausgewählte Versionen werden verglichen';
$string['diffprogressdone'] = 'Insgesamt {$a} Unterschiede gefunden';
$string['diffstaged'] = 'diff';
$string['diffstrings'] = 'Texte aus zwei Zweigen vergleichen';
$string['diffstrings_help'] = 'Alle Texte der beiden ausgewählten Zweige werden verglichen. Sollten Unterschiede vorhanden sein, werden beide Texte in den Arbeitsspeicher übernommen. Über die Option "Arbeitsspeicher bearbeiten" können Sie eventuell nötige Änderungen vornehmen.';
$string['diffversions'] = 'Versionen';
$string['emailacceptbody'] = '{$a->assignee} betreut das Sprachpaket und hat die eingesandte Übersetzung angenommen:
#{$a->id} {$a->subject}

Weitere Details: {$a->url}';
$string['emailacceptsubject'] = '[AMOS] - Vorschlag angenommen';
$string['emailcontributionbody'] = '{$a->author} hat eine neue Übersetzung eingesandt:
#{$a->id} {$a->subject}

Weitere Details: {$a->url}';
$string['emailcontributionsubject'] = '[AMOS] - Neue Übersetzung';
$string['emailrejectbody'] = '{$a->assignee} betreut das Sprachpakets und hat die eingesandte Übersetzung abgelehnt:
#{$a->id} {$a->subject}

Weitere Details: {$a->url}';
$string['emailrejectsubject'] = '[AMOS] - Vorschlag abgelehnt';
$string['emailreviewbody'] = '{$a->assignee} betreut das Sprachpaket und hat begonnen, die eingereichte Übersetzung zu prüfen.
#{$a->id} {$a->subject}

Weitere Details: {$a->url}';
$string['emailreviewsubject'] = '[AMOS] - Prüfung begonnen';
$string['err_exception'] = 'Fehler: {$a}';
$string['err_invalidlangcode'] = 'Ungültiger Sprachcode';
$string['err_parser'] = 'Parsingfehler: {$a}';
$string['filtercmp'] = 'Komponenten';
$string['filtercmp_desc'] = 'Texte dieser Komponenten zeigen';
$string['filterlng'] = 'Sprachen';
$string['filterlng_desc'] = 'Übersetzungen dieser Sprachen zeigen';
$string['filtermis'] = 'Einschränkungen';
$string['filtermis_desc'] = 'Suche mit weiteren Angaben einschränken';
$string['filtermisfglo'] = 'Nur zurückgestellte Texte';
$string['filtermisfhlp'] = 'Nur Hilfetexte';
$string['filtermisfmis'] = 'Nur fehlende und geänderte Texte';
$string['filtermisfstg'] = 'Nur Texte im Arbeitsspeicher';
$string['filtermisfwog'] = 'Ohne zurückgestellte Texte';
$string['filtersid'] = 'Text-ID';
$string['filtersid_desc'] = 'Eindeutiges Schlüsselmerkmal';
$string['filtersidpartial'] = 'teilweise übereinstimmend';
$string['filtertxt'] = 'Textsuche';
$string['filtertxtcasesensitive'] = 'Groß-/Kleinschreibung';
$string['filtertxt_desc'] = 'Angegebener Textteil muss enthalten sein';
$string['filtertxtregex'] = 'regex';
$string['filterver'] = 'Versionen';
$string['filterver_desc'] = 'Texte dieser Moodle-Versionen zeigen';
$string['found'] = 'Gefunden: {$a->found}     Fehlend: {$a->missing} ({$a->missingonpage})';
$string['foundinfo'] = 'Zahl der gefundenen Texte';
$string['foundinfo_help'] = 'Folgende Werte werden angezeigt: Gesamtzahl der Texte in der Übersetzungsdatei, Zahl der fehlenden Übersetzungen und Zahl der fehlenden Übersetzungen auf der aktuellen Seite';
$string['gotofirst'] = 'Zur ersten Seite';
$string['gotoprevious'] = 'Zur vorigen Seite';
$string['greylisted'] = 'Zurückgestellte Texte';
$string['greylistedwarning'] = 'Zurückgestellter Text';
$string['importfile'] = 'Übersetzte Texte aus einer Datei importieren';
$string['language'] = 'Sprache';
$string['languages'] = 'Sprachen';
$string['languagesall'] = 'Alle';
$string['languagesnone'] = 'Keine';
$string['log'] = 'Logdaten';
$string['logfilterbranch'] = 'Versionen';
$string['logfiltercommithash'] = 'git hash
';
$string['logfiltercommitmsg'] = 'Abgabe enthält';
$string['logfiltercommits'] = 'Abgabefilter';
$string['logfiltercommittedafter'] = 'Abgabe nach';
$string['logfiltercommittedbefore'] = 'Abgabe vor';
$string['logfiltercomponent'] = 'Komponenten';
$string['logfilterlang'] = 'Sprachen';
$string['logfiltershow'] = 'Gefilterte Abgaben und Texte zeigen';
$string['logfiltersource'] = 'Quelle';
$string['logfiltersourceamos'] = 'AMOS (Webbasierter Übersetzer)';
$string['logfiltersourcecommitscript'] = 'commitscript (AMOScript in der Mitteilung)';
$string['logfiltersourcegit'] = 'git (git-Server für Moodle-Quelltexte und 1.x-Pakete)';
$string['logfilterstringid'] = 'Text-ID';
$string['logfilterstrings'] = 'Textfilter';
$string['logfilterusergrp'] = 'Abgabe durch';
$string['logfilterusergrpor'] = 'oder';
$string['maintainers'] = 'Maintainer';
$string['markuptodate'] = 'Übersetzung ist aktuell';
$string['markuptodate_help'] = 'AMOS hat einen Text als \'Geändert\' markiert, weil die englische Version des Textes nach der Übersetzung verändert wurde. Entscheiden Sie bitte, ob die Übersetzung weiter gelten soll, oder bearbeiten Sie den Text.
';
$string['merge'] = 'Zuführen';
$string['mergestrings'] = 'Texte aus anderem Zweig zuführen';
$string['newlanguage'] = 'Neue Sprache';
$string['nodiffs'] = 'Keine Unterschiede gefunden';
$string['nofiletoimport'] = 'Bitte geben Sie eine Datei für den Import an.';
$string['nologsfound'] = 'Keine Texte gefunden - bitte prüfen Sie die Filtereinstellung';
$string['nostringsfound'] = 'Keine Texte gefunden';
$string['nostringsfoundonpage'] = 'Keine Texte auf Seite {$a} gefunden';
$string['nostringtoimport'] = 'Es wurde keine gültige Textzeile in der Datei gefunden. Stellen Sie sicher, dass Sie den richtige Datei gewählt haben und dass die Datei richtig formatiert ist.';
$string['nothingtomerge'] = 'Der Quellzweig enthält keine neuen Textzeilen, die im Zielzweig fehlen. Es gibt nichts hinzuzufügen.';
$string['nothingtostage'] = 'Bei der Ausführung konnte kein Text gefunden und in den Arbeitsspeicher geholt werden.';
$string['numofcommitsabovelimit'] = '{$a->found} zum Filter passende Einreichungen gefunden, {$a->limit} werden gezeigt';
$string['numofcommitsunderlimit'] = '{$a->found} zum Filter passende Einreichungen gefunden';
$string['outdatednotcommitted'] = 'Geänderter Text';
$string['outdatednotcommitted_help'] = 'AMOS hat einen Text als \'Geändert\' markiert, weil die englische Version des Textes nach der Übersetzung verändert wurde. Bitte prüfen Sie die Übersetzung.';
$string['outdatednotcommittedwarning'] = 'Geändert';
$string['ownstashes'] = 'Ihre Ablagen';
$string['ownstashes_help'] = 'Liste von allen Ihren Ablagen';
$string['ownstashesnone'] = 'Keine eigenen Ablagen';
$string['permalink'] = 'Dauerlink';
$string['placeholder'] = 'Platzhalter';
$string['placeholder_help'] = 'Platzhalter sind spezielle Anweisungen innerhalb des Textes, wie z.B. \'{$a}\' oder \'{$a->something}\'. Sie werden bei der Ausgabe des Textes durch einen Wert ersetzt.

Es ist wichtig, die Platzhalter genauso zu kopieren, wie sie im Original vorkommen. Sie dürfen nicht übersetzt oder aus ihrer Schreibrichtung links-nach-rechts geändert werden.';
$string['placeholderwarning'] = 'Text mit Platzhalter';
$string['pluginclasscore'] = 'Core (Kernsystem)';
$string['pluginclassnonstandard'] = 'Plugins (nicht standardmäßig)';
$string['pluginclassstandard'] = 'Plugins (standardmäßig)';
$string['pluginname'] = 'AMOS';
$string['presetcommitmessage'] = 'Übersetzung #{$a->id} von {$a->author}';
$string['presetcommitmessage2'] = 'Fehlende Textzeilen von {$a->source} nach {$a->target} hinzugefügt';
$string['presetcommitmessage3'] = 'Unterschiede zwischen {$a->versiona} und {$a->versionb} werden behoben';
$string['privileges'] = 'Ihre Berechtigungen';
$string['privilegesnone'] = 'Sie haben Leserecht für öffentliche Informationen.';
$string['requestactions'] = 'Aktion';
$string['savefilter'] = 'Filtereinstellungen sichern';
$string['script'] = 'AMOScript';
$string['scriptexecute'] = 'Ausführen und Ergebnis in den Arbeitsspeicher';
$string['script_help'] = 'AMOScript sind Operationen, die mit den Texten im Repository ausgeführt werden.';
$string['sourceversion'] = 'Quelle';
$string['stage'] = 'Arbeitsspeicher';
$string['stageactions'] = 'Aktionen im Arbeitsspeicher';
$string['stageedit'] = 'Arbeitsspeicher bearbeiten';
$string['stagelang'] = 'Lang';
$string['stageoriginal'] = 'Original';
$string['stageprune'] = 'Nicht nutzbare entfernen';
$string['stagerebase'] = 'Sortieren';
$string['stagestring'] = 'Text';
$string['stagestringsnocommit'] = 'Texte im Arbeitsspeicher: {$a->staged}';
$string['stagestringsnone'] = 'Kein Text im Arbeitsspeicher';
$string['stagestringssome'] = 'Texte im Arbeitsspeicher: {$a->staged}, davon {$a->committable} nutzbar';
$string['stagesubmit'] = 'An Betreuer senden';
$string['stagetranslation'] = 'Übersetzung';
$string['stageunstageall'] = 'Alle verwerfen';
$string['stashactions'] = 'Aktionen in den Ablagen';
$string['stashactions_help'] = 'Eine Ablage ist eine Momentaufnahme des aktuellen Arbeitsspeichers. Eine solche Ablage kann als Vorschlag an die Maintainer des Sprachpakets geschickt werden.';
$string['stashapply'] = 'Anwenden';
$string['stashautosave'] = 'Automatische Sicherungsablage';
$string['stashcomponents'] = '<span>Komponenten:</span> {$a}';
$string['stashdrop'] = 'Weglegen';
$string['stashes'] = 'Ablagen';
$string['stashlanguages'] = '<span>Sprachen:</span> {$a}';
$string['stashpop'] = 'Aufnehmen';
$string['stashpush'] = 'Arbeitsspeicher in Ablage sichern';
$string['stashstrings'] = '<span>Anzahl der Texte:</span> {$a}';
$string['stashsubmit'] = 'An Betreuer senden';
$string['stashsubmitdetails'] = 'Kurze Mitteilung';
$string['stashsubmitmessage'] = 'Nachricht';
$string['stashsubmitsubject'] = 'Betreff';
$string['stashtitle'] = 'Name der Ablage';
$string['stashtitledefault'] = 'Stand {$a->time}';
$string['stringhistory'] = 'Verlauf';
$string['strings'] = 'Texte';
$string['submitting'] = 'Vorschlag einreichen';
$string['targetversion'] = 'Ziel
';
$string['translatorlang'] = 'Sprache';
$string['translatorlang_help'] = 'Dies ist der Code des Sprachpakets, zu dem die Übersetzung gehört. Klicken Sie auf <strong>+</strong>, um die Entwicklung dieses Textes anzuzeigen.';
$string['translatororiginal'] = 'Original';
$string['translatororiginal_help'] = 'Das englische Original zur Textzeile wird angezeigt. Darunter finden Sie einen Link, der den Text automatisch mit dem Google Translator übersetzt (falls die Sprache unterstützt wird und Javascript aktiviert ist). Zusätzlich sind Informationen vorhanden, z.B. wenn ein Platzhalter benutzt wird.';
$string['translatorstring'] = 'Kennung';
$string['translatorstring_help'] = 'Die Kennung zeigt die Moodle-Version (branch), die Text-ID und die Komponente an, zu der der Text gehört.';
$string['translatortool'] = 'Übersetzer';
$string['translatortranslation'] = 'Übersetzung';
$string['typecontrib'] = 'Plugins (nicht standardmäßig)';
$string['typecore'] = 'Core (Kernsystem)';
$string['typestandard'] = 'Plugins (standardmäßig)';
$string['unstage'] = 'Entfernen';
$string['unstageconfirm'] = 'Wirklich?';
$string['unstaging'] = 'Entfernen ...';
$string['version'] = 'Version';
