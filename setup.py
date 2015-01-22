#!/usr/bin/python

import os
import getpass

def setup():
    # Take all the configuration inputs for database
    dbHost = raw_input("Enter database host(usually localhost): ")

    if dbHost == "":
        dbHost = "localhost"

    dbUsername = raw_input("Enter database username(usually root): ")

    if dbUsername == "":
        dbUsername = "root"

    dbPassword = getpass.getpass("Enter database password: ")

    print("Checking mysql connection...")

    if(os.system("mysql -h " + dbHost + " -u " + dbUsername + " -p" + dbPassword + " < db/schema.sql")):
        print("Error: Wrong username/password/host. Please check again...Aborted")
        exit()
    else:
        print("User authenticated. Connected to mysql server...")
        print("Database schema at db/schema.sql imported successfully...")

    if(os.system("mysql -h " + dbHost+" -u " + dbUsername + " -p" + dbPassword + " < db/data.sql")):
        print("Error: Wrong username/password/host. Please check again...Aborted")
        exit()
    else:
        print("Data at db/data.sql imported successfully...")

    print("Configuring project...")

    # Generate configuration
    output = "<?php\n"
    output += "define('DB_HOST', '" + dbHost + "');\n"
    output += "define('DB_USER_NAME', '" + dbUsername + "');\n"
    output += "define('DB_PASSWORD', '" + dbPassword +"');\n"
    output += "define('DB_DATABASE', 'ETRS');\n"

    # Write to configuration file
    f = open("var/DBConfig.php","wb")
    f.write(output)
    f.close()

    print("Configuring project...DONE")
    print("Configuration has been written to var/DBConfig.php. Edit that file for any mistakes or run setup.py again.")

def main():
    setup()

if __name__ == "__main__":
    main()
