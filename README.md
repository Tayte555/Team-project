# SoleHaven

SoleHaven is a dynamic e-commerce platform dedicated to the sale of sneakers and related accessories. Utilizing PHP, HTML, CSS, and JavaScript, SoleHaven was developed as a collaborative effort for the Aston University Computer Science Teamm Project module.

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)
![Apache](https://img.shields.io/badge/apache-%23D42029.svg?style=for-the-badge&logo=apache&logoColor=white)

![GitHub commit activity](https://img.shields.io/github/commit-activity/m/solehaven-project/solehaven)
![GitHub contributors](https://img.shields.io/github/contributors/solehaven-project/solehaven)
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/solehaven-project/solehaven/test_and_deploy.yml)

## Table of Contents

- [Local Development](#local-development)
    - [Windows](#windows)
    - [macOS](#macos)
- [Database Setup](#database-setup)
- [Implementing Sample Data](#implementing-sample-data)
- [Acknowledgements](#acknowledgements)


## Documentation


The complete documentation for SoleHaven is available in the project's [Wiki]().


## Local Development


Follow these steps to prepare your environment for local development and testing.


### Windows


1. Download and install XAMPP.
    ```powershell
    winget install -e --id ApacheFriends.Xampp.8.2
    ```


2. Clone the repository and navigate to its root directory.
    ```powershell
    git clone https://github.com/Tayte555/Team-project
    cd solehaven
    ```


3. Launch XAMPP and start Apache and MySQL services.


4. Execute the Windows setup script.
    ```powershell
    .\setup\setupWindows.ps1
    ```


5. Visit these URLs in your web browser:
    - http://localhost
    - http://localhost/phpmyadmin


6. Follow the on-screen instructions to complete the SoleHaven setup.


### macOS


1. Install Xcode command-line tools.
    ```bash
    xcode-select --install
    ```


2. Install Homebrew.
    ```bash
    /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh) NONINTERACTIVE=1"
    ```


3. Install XAMPP via Homebrew.
    ```bash
    brew install --cask xampp
    ```


4. Clone the SoleHaven repository and change to its directory.
    ```bash
    git clone https://github.com/Tayte555/Team-project
    cd solehaven
    ```


5. Initiate Apache and MySQL through XAMPP (manager-osx).


6. Run the macOS setup script.
    ```bash
    ./setup/setupMac.sh
    ```


7. Access these links in your browser:
    - http://localhost/phpmyadmin
    - http://localhost


To resume local development in the future, simply restart Apache and MySQL services through XAMPP and navigate to the provided local URLs.


## Database Setup


Before the SoleHaven site becomes operational, the database structure must be established.


**Tip:** The SoleHaven OOBE (Out of Box Experience) setup will automatically configure the database. If you bypassed the OOBE setup, follow these manual instructions.


1. Navigate to http://localhost/phpmyadmin in your browser.


2. Log in with your MySQL credentials (default username is `root` with no password).


3. The database name should correspond to your username followed by '_db'. For example, `root_db`.


4. Go to the `SQL` tab.


5. Locate the `sdb.sql` file within the `store` directory.


6. Open and copy all contents from the file, then paste them into the SQL command field.


7. Execute the commands by clicking `Go`.


## Implementing Sample Data


For testing purposes, SoleHaven's database can be filled with sample data.


**Tip:** Selecting the sample data option during the OOBE setup will populate the database for you. If not using the OOBE, proceed as follows:


### SQL Product Data


This populates your database with mock sneaker listings, a necessity for the platform's functionality.


1. Access http://localhost/phpmyadmin in your browser.


2. Log in using your MySQL credentials.


3. Confirm the database is set up as instructed in [Database Setup](#database-setup).


4. Within the database, select the `SQL` tab.


5. Open the `db.sql` file located in the `store` directory.


6. Copy and paste the file content into the SQL command field.


7. Execute by clicking `Go`.


### Image Data for Products


This step populates the `images` directory with sample sneaker images, enhancing the site's visual appeal.


1. Copy image folders from `setup/examplePhotos/sneakers` to `view/images/sneakers`.
    - E.g., copy `setup/examplePhotos/sneakers/1` to `view/images/sneakers/1`.
    - This can be performed using a file explorer or via command line.


## Acknowledgements


SoleHaven is the product of dedicated teamwork by students at Aston University. Special thanks to our team members for their contributions:



- Tayte Keates (220085397) - Backend Developer  Lead
- Mohammed Zeinelabdin (220131823) - Frontend Developer
- Muhammed Tahmid Ahmed (220083463) - Frontend Developer
- Ahmad Hamour (220331744) - Frontend Developer | UI/UX Design | Documentation
- Sheriff Adisa (220041681) Frontend Developer
- Ishwar Saul (210173859) - Backend Developer
- Daiyan Ahad (200165433) - Frontend Developer  |  UI/UX Lead
- Hani Hussain (220183497) Frontend Developer


For any queries, suggestions, or contributions, please refer to our [GitHub repository](https://github.com/Tayte555/Team-project).