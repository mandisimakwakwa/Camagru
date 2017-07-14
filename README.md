# Camagru
Web Video Engine for PHP

    *About:
        Camagru is a web-application project.
        
        *Requirements:
            ^ Use of PDO
            ^ Register Users
            ^ Login Users
            ^ Verify Login via Email
            ^ Allow user to recover passwords via Email
            ^ Take Pictures from web cam
            ^ Merge superposable images with web cam images
            ^ Display Results in Gallery
            ^ Navigate Gallery via Pagination
            ^ Display Gallery on index
            ^ SQL Injections vulnerability not allowed
            ^ PHP DB Schema capable of creating and recreating Databases and Tables
            ^ index file on the root of project
            ^ User DB management through users gallery

            
        *Restrictions
            ^ No Frameworks allowed
            ^ No micro-frameworks allowed
            ^ Code shouldn't produce any errors(getUserMedia console log errors: tolerated)
            ^ Validation of all forms

    * How to Use
        Step 1: Take Picture
        Step 2: Click Desired Merge Image
        Step 3: Click Save
        Step 4: Enjoy everything else
        
    /* 
        Note after clicking save
        image should appear on the
        gallery to your right
    */
        
    *Directory Structure
    
        L1: Camagru/
            L2: resources/
                L3: merges/
                    L4: 1.png
                        2.png
                        3.png
                        4.png
            L2: sources/
                L3: backEnd/
                    L4: config/
                        L5: database.php
                            setup.php
                    L4: engine/
                        L5: handlers/
                                L6: indexPageHandler.php
                                    mainPageHandler.php
                                    galleryHandler.php
                                    paginationHandler.php
                                    mysqlPHPHandler.php
                                    camagruJavascriptHandler.js
                        L5: controllers/
                                L6: indexController.js
                                    mainController.js
                                    ajaxController.js
                                    phpPathController.php
                        L5: camagruDAO.php //User Control
                            camagruDTO.php //Application Handling
                L3: frontEnd/
                    L4: html/
                        L5: htmlLayouts/
                            L6: main.php
                        L5: htmlTemplates/
                            L6: index/
                                L7: indexHeader.php
                                    indexSectionMain.php
                                    indexFooter.php
                            L6: main/
                                L7: mainHeader.php
                                    mainSectionMain.php
                                    mainSectionAside.php
                                    mainFooter.php
                    L4: css/
                        L5: index.css
                            main.css
                            camagru.css
                L3: index.php
                    LICENSE
                    README.md
                    .gitignore
                    
    /* 
    
        Extra Comments
        
        camagruDTO : User Control
        camagruDAO : Application Control
    */