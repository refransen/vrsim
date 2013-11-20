@echo off
schtasks /delete /tn "LMS User syncs" /f
schtasks /delete /tn "LMS Cron" /f
