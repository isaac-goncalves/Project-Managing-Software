TERMINAL CHEAT-SHEET

ipconfig: ipconfig getifaddr en1
flushdns: sudo dscacheutil -flushcache;sudo killall -HUP mDNSResponder
start postgresql service: 
Check current postgresql running services: ps auxwww | grep postgres
Run php server: php -S localhost:80
Check php.ini: php —ini
Copy php.ini.default to another: sudo cp php.ini.default php.ini
Edit php.ini file: sudo nano php.ini
brew running services (and actions): 	
brew services list	
brew services start (name of service)
brew services stop (name of service)	
brew services restart (name of service)
postgreSQL general commands:	
psql: faz alguma coisa que nao entendi
\du: lista os usuarios cadastrados	
psql - U USERNAME: loga com o usuario informado no postgre
create new user: sudo -u postgres createuser db_SYSMANAGER
create database: sudo -u postgres createdb DBNAME
