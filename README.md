# Scouting2016
2016 Code Orange Scouting System

Installation
  1. Install Apache, PHP, MySQL server to host machine (We used WAMP on our Windows machine, Macs may requre XAMPP)
    - Follow each software's instructions. WAMP requires Visual C++ to be installed before installing it. 
    - During setup, a MySQL password and name might be set. If the default is changed please make a note of it.
  2. Place the contents of this project (clone it or a direct file transfer) within the server software's www folder. 
    - For wamp, it is usually found at C:\wamp\www\
  3. Edit the username and password in databaseName16.php if changed during initial setup.
  4. Start webserver, usually by running an executable provided by the server software
     - For WAMP, once started, a tool icon can be found in the bottom right icon drawer
  5. Set up SQL
    - If using WAMP open up PHPMyAdmin by left clicking on the WAMP icon in the drawer and clicking on PHPMyAdmin
    - Log into PHPMyAdmin (default should be user name 'root' with no password)
    - Create tables
      - Click on the 'SQL' tab
      - Copy the contents of setup/initialTable.sql into the text box and press 'go'
      - There should be no errors. If there are, something in the process wasn't done correctly
  6. At this point the system should be working for the single machine. If the server is running, go to the web browser and enter 'localhost'
    - If the index.php page isn't seen, something is wrong
  7. Setting up server to work with external computers
    - Modifying Apache Config
      - Go to the WAMP icon -> Apache - httpd.conf and replace the contents with setup/httpd.conf
    - Modify PHP settings
      - Look at the local/phpConfig.png image to see how the PHP setting should look like for a machine running WAMP
  8. Finding the IP address of the host machine
    - Make sure the host is connected to a switch first
    - Go to "Network and Sharing Center"
    - Click on "Ethernet"
    - Click "Details"
    - The IPv4 Address is what other computers on the network will need to enter into the browser address bar to reach the host
     
That should be all to make the system fully work on a machine. Please email saikiranra@gmail.com if there are any questions.
    
