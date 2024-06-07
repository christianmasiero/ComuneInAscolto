#############################################################################
                         Uniform Server Zero XV 
#############################################################################
 08-12-2022
#############################################################################

-----------
Introduction
-----------
 The Uniform Server Zero is designed for portability; emphasis is
 given to reducing code size. The Uniform Server Zero achieves this
 through a modular implementation. Install only modules (plugins)
 you require. These are listed in the documentation plugin section:
 ZeroXV_documentation_x_x_x.exe

 Uniform Server ZeroXV releases are versions with pre-installed ZeroXV modules
 producing a standard WAMP (Windows, Apache, MySQL and PHP) server
 package. After extracting, servers are ready to run either from a
 USB memory stick or PC. Apart from changing the MySQL password
 (optional), there is no configuration required.

 The pre-configured versions of Uniform Server ZeroXV should suit most
 users! An alternative is to assemble a bespoke server from the available
 modules provided on the following page:  

 ZeroXV modules  (Plugins):
 https://sourceforge.net/projects/miniserver/files/Uniform%20Server%20ZeroXV/ZeroXV%20Modules/

------------------------
Install module (plugins)
------------------------

 All plugins are installed as follows:
  1) Copy a plugin to folder UniServerZ.
  2) Double-click on the downloaded plugin; this starts the extraction process.
  3) If requested, allow overwriting of existing files.

 Notes: Apache and PHP binaries are compiled with Visual Studio. 
 Ensure you have installed the latest supported Microsoft Visual C++ Redistributable packages for Visual Studio.
 Download: https://support.microsoft.com/en-us/help/2977003/the-latest-supported-visual-c-downloads (select: vc_redist.x64.exe)

 After installing a PHP module, always restart UniController.

--------------------
Clean module install
--------------------

 First time installation of modules requires nothing special; proceed as above.

 For modules that have already been installed, first delete the module folder and
 then proceed as above.

 Module name and corresponding folder to delete is listed below:

 ZeroXV_apache_2_x_x.exe    UniServerZ\core\apache2
 
 ZeroXV_mysql_8_x_x.exe     UniServerZ\core\mysql
 ZeroXV_mariadb_10_x_x.exe  UniServerZ\core\mysql

 ZeroXV_palemoon_31_x_x.exe UniServerZ\core\palemoon

 ZeroXV_php_7_0_x.exe       UniServerZ\core\php70
 ZeroXV_php_7_1_x.exe       UniServerZ\core\php71
 ZeroXV_php_7_2_x.exe       UniServerZ\core\php72
 ZeroXV_php_7_3_x.exe       UniServerZ\core\php73
 ZeroXV_php_7_4_x.exe       UniServerZ\core\php74
 ZeroXV_php_8_0_x.exe       UniServerZ\core\php80
 ZeroXV_php_8_1_x.exe       UniServerZ\core\php81
 ZeroXV_php_8_2_x.exe       UniServerZ\core\php82

 ZeroXV_phpmyadmin_5_x_x.exe      UniServerZ\home\us_opt1
 ZeroXV_adminer_4_x_x.exe         UniServerZ\home\us_opt2
 ZeroXV_mysqlautobackup_1_x_x.exe UniServerZ\utils (except EdHost.exe)

 ZeroXV_strawberry_perl_5_x_x.exe UniServerZ\home\perl
 
 --------------------------------
 Uniform Server ZeroXV Change Log
 --------------------------------

  15.0.0  - ZeroXV modules included:
          - ZeroXV_controller_2_5_0.exe
          - ZeroXV_documentation_1_1_1.exe
          - ZeroXV_apache_2_4_54.exe (June 2022 release)
          - ZeroXV_mysql_8_0_30.exe
          - ZeroXV_php_8_1_11.exe
          - ZeroXV_phpmyadmin_5_2_0.exe

  15.0.1  - ZeroXV modules included:
          - ZeroXV_controller_2_5_1.exe
          - ZeroXV_documentation_1_1_2.exe
          - ZeroXV_apache_2_4_54.exe (November 2022 release)
          - ZeroXV_mysql_8_0_31.exe
          - ZeroXV_php_8_2_0.exe
          - ZeroXV_phpmyadmin_5_2_0.exe
 
 
 -----------------------------------------------------------------------------

  The authors were trying to make the best product so they cannot be held
  responsible for any type of damage or problems caused by using this or
  another software.

 --------------------------------------o0o------------------------------------
            Copyright 2002-2022 The Uniform Server Development Team
                            All rights reserved.
