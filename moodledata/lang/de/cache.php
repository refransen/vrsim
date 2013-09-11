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
 * Strings for component 'cache', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   cache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Aktivitäten';
$string['addinstance'] = 'Instanz hinzufügen';
$string['addstore'] = 'Speicher {$a} hinzufügen';
$string['addstoresuccess'] = 'Speicher {$a} erfolgreich hinzugefügt';
$string['area'] = 'Bereich';
$string['cacheadmin'] = 'Cache Verwaltung';
$string['cacheconfig'] = 'Konfiguration';
$string['cachedef_databasemeta'] = 'Metainformationen zur Datenbank';
$string['cachedef_eventinvalidation'] = 'Termin löschen';
$string['cachedef_htmlpurifier'] = 'HTML Purifier - Inhalt entfernt';
$string['cachedef_locking'] = 'Sperrung';
$string['cachedef_questiondata'] = 'Fragedefinition';
$string['cachedef_string'] = 'Sprachstring-Cache';
$string['cachelock_file_default'] = 'Standard-Dateisperre';
$string['cachestores'] = 'Cache-Speicher';
$string['caching'] = 'Caching';
$string['component'] = 'Komponente';
$string['confirmstoredeletion'] = 'Speicherlöschung bestätigen';
$string['default_application'] = 'Standard Anwendungsspeicher';
$string['defaultmappings'] = 'Speicherort wenn keine Definition erstellt wurde';
$string['defaultmappings_help'] = 'Dies sind die Standardspeicherorte falls keine Orte für die verschiedenen Cache-Definitionen angelegt wurden.';
$string['default_request'] = 'Standard-Abfrage-Speicherort';
$string['default_session'] = 'Standard Sessionspeicher';
$string['defaultstoreactions'] = 'Standardspeicher können nicht verändert werden';
$string['definition'] = 'Definition';
$string['definitionsummaries'] = 'Bekannte Cachedefinitionen';
$string['delete'] = 'Löschen';
$string['deletestore'] = 'Speicher löschen';
$string['deletestoreconfirmation'] = 'Möchten Sie den Speicher \'{$a}\' wirklich löschen?';
$string['deletestorehasmappings'] = 'Sie können diesen Speicherplatz nicht löschen, da es Zuordnungen für ihn gibt. Löschen Sie zuerst die Zuordnungen.';
$string['deletestoresuccess'] = 'Der Cache-Speicher wurde erfolgreich gelöscht.';
$string['editdefinitionmappings'] = '{$a} Speicherzuordnungs-Definitionen';
$string['editmappings'] = 'Bearbeiten';
$string['editstore'] = 'Speicher bearbeiten';
$string['editstoresuccess'] = 'Der Cache-Speicher wurde erfolgreich bearbeitet.';
$string['ex_configcannotsave'] = 'Die Cache-Konfiguration konnte nicht in einer Datei gespeichert werden.';
$string['ex_nodefaultlock'] = 'Die Default-Instanz zum Sperren wurde nicht gefunden';
$string['ex_unabletolock'] = 'Der Aufruf einer Speichersperre zum Caching war nicht möglich.';
$string['ex_unmetstorerequirements'] = 'Sie können diesen Speicher zur Zeit nicht verwenden. Bitte prüfen Sie anhand der Dokumentation die Voraussetzungen.';
$string['gethit'] = 'Get - Hit';
$string['getmiss'] = 'Get - Miss';
$string['invalidplugin'] = 'Ungültiges Plugin';
$string['invalidstore'] = 'Speicherplatz für Cache ist ungültig';
$string['lockdefault'] = 'Standard';
$string['lockmethod'] = 'Sperrmethode';
$string['lockmethod_help'] = 'Sperrmethode falls für diesen Speicher erforderlich';
$string['lockname'] = 'Name';
$string['locksummary'] = 'Zusammenstellung der Speicher-Sperr-Instanzen';
$string['lockuses'] = 'Nutzung';
$string['mappingdefault'] = '(standard)';
$string['mappingfinal'] = 'Endgültiger Speicher';
$string['mappingprimary'] = 'Primärer Speicher';
$string['mappings'] = 'Speicher-Zuordnungen';
$string['mode'] = 'Modus';
$string['mode_1'] = 'Anwendung';
$string['mode_2'] = 'Session';
$string['mode_4'] = 'Anfrage';
$string['modes'] = 'Modi';
$string['nativelocking'] = 'Dieses Plugin verwendet eigene Sperrungen.';
$string['none'] = 'Kein';
$string['plugin'] = 'Plugin';
$string['pluginsummaries'] = 'Installierte Cache-Speicher';
$string['purge'] = 'Verwerfen';
$string['purgestoresuccess'] = 'Gewählten Speicher erfolgreich gelöscht';
$string['requestcount'] = 'Test mit {$a} Zugriffen';
$string['rescandefinitions'] = 'Definitionen erneut auswerten';
$string['result'] = 'Ergebnis';
$string['set'] = 'Einstellung';
$string['storeconfiguration'] = 'Speicherkonfiguration';
$string['store_default_application'] = 'Standard Dateispeicher für Anwendungen';
$string['store_default_request'] = 'Standard Static-Speicher für Abfrage-Caches';
$string['store_default_session'] = 'Standard Session-Speicher für Session-Caches';
$string['storename'] = 'Speichername';
$string['storenamealreadyused'] = 'Definieren Sie einen eindeutigen Namen für diesen Speicher';
$string['storename_help'] = 'Legen Sie den Speichernamen fest. Er wird zur Identifikation des Speichers verwandt. Der Name kann aus Groß-/Kleinbuchstaben Zahlen, \'-\',  \'_\' und Leerzeichen bestehen. Ungültige Eingaben erzeugen eine Fehlernachricht.';
$string['storenameinvalid'] = 'Ungültiger Speichername. Verwenden Sie nur Groß-, Kleinbuchstaben, Ziffern und \'-\', \'_\' oder Leerzeichen';
$string['storenotready'] = 'Speicher nicht bereitgestellt.';
$string['storeperformance'] = 'Cache-Speicher Leistungsbericht - {$a} einzelne Anfragen je Operation.';
$string['storeready'] = 'Fertig';
$string['storerequiresattention'] = 'Erfordert Ihre Aufmerksamkeit';
$string['storerequiresattention_help'] = 'Diese Speicherinstanz ist noch nicht fertiggestellt. Es gibt jedoch Zuordnungen. Die Performance verbessert sich, wenn Sie dies korrigieren. Prüfen Sie, ob das Backend für den Speicher zur Nutzung bereitsteht und die PHP-Anforderungen erfüllt sind.';
$string['storeresults_application'] = 'Abfragen speichern als Applikationscache';
$string['storeresults_request'] = 'Abfragen speichern als Abfragecache';
$string['storeresults_session'] = 'Abfragen speichern als Sessioncache';
$string['stores'] = 'Speicher';
$string['storesummaries'] = 'Speicher-Instanzen konfigurieren';
$string['supports'] = 'Unterstützungen';
$string['supports_dataguarantee'] = 'Datengarantie';
$string['supports_multipleidentifiers'] = 'Mehrere Identifizierungen';
$string['supports_nativelocking'] = 'sperren';
$string['supports_nativettl'] = 'ttl';
$string['supports_searchable'] = 'Nach Schlüssel suchen';
$string['tested'] = 'Geprüft';
$string['testperformance'] = 'Geschwindigkeit testen';
$string['unsupportedmode'] = 'Nichtunterstützter Modus';
$string['untestable'] = 'Nicht prüfbar';
