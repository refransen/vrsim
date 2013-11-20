@echo off
schtasks /create /sc minute /mo 5 /tn "LMS User syncs" /tr C:\SBCServ\htdocs\moodle\cronb.bat /ru "SYSTEM" /f
schtasks /create /sc minute /mo 30 /tn "LMS Cron" /tr C:\SBCServ\htdocs\moodle\crona.bat /ru "SYSTEM" /f

C:\SBCServ\htdocs\moodle\cronb.bat
C:\SBCServ\htdocs\moodle\crona.bat
