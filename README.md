# Security Reporting Web Platform

Welcome to the Security Reporting Web Platform! This web application is designed for users to submit security incident reports and generate PDFs with provided intel.

## Table of Contents
- [Introduction](#introduction)
- [Features](#features)
- [Screenshots](#screenshots)
- [Getting Started](#getting-started)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Introduction

During my summer internship at Wevioo, I developed this web platform using PHP, MySQL, Bootstrap, and JavaScript. The platform includes user authentication, incident reporting forms, PDF generation, and an admin panel for user management. User data is encrypted with the SHA-5 algorithm in the MySQL database.

## Features

- User authentication with standard and administrator roles.
- Incident reporting forms for users to submit security reports.
- PDF generation with provided intelligence from submitted reports.
- Admin panel for user management.
- Data encryption using SHA-5 algorithm.

## Screenshots

1. Sign-In Page<br>
   ![Sign-In Page](https://github.com/Khaled-Chaabouni/Incident_reporting/blob/main/images/Sign-in.png)

2. Sign-Up Page<br>
   ![Sign-Up Page](https://github.com/Khaled-Chaabouni/Incident_reporting/blob/main/images/Sign-up.png)

3. Filled Report Card<br>
   ![Filled Report Card](https://github.com/Khaled-Chaabouni/Incident_reporting/blob/main/images/Report_ex.png)

4. Output PDF File<br>
   ![Output PDF](https://github.com/Khaled-Chaabouni/Incident_reporting/blob/main/images/Reported_pdf.png)

5. Admin Panel<br>
   ![Admin Panel](https://github.com/Khaled-Chaabouni/Incident_reporting/blob/main/images/Admin-panel.png)

## Getting Started

To get started with the Security Reporting Web Platform, follow these steps:

1. Clone the repository: `git clone https://github.com/your-username/security-reporting-platform.git`
2. Set up your web server with PHP and MySQL.
3. Import the database schema from `database/schema.sql`.
4. Configure the database connection in `config.php`.
5. Open the application in your web browser.

## Usage

1. Register for a standard user account or log in as an administrator.
2. Use the incident reporting forms to submit security reports.
3. Access the admin panel for user management.
4. Generate PDFs with the provided intelligence from submitted reports.

## Contributing

If you'd like to contribute to the project, please follow the [contribution guidelines](CONTRIBUTING.md).

## License

This project is licensed under the [MIT License](LICENSE).
