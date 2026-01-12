# QuickChoice 🍽️

**QuickChoice** is a real-world SaaS web application built in collaboration with my friend [Khalfaoui Driss](https://github.com/DrissKhalfaoui). It empowers restaurant managers to manage their menus effortlessly and provide a modern digital experience for their customers.

## 🚀 Features

- Add, edit, and delete menu items
- Customize the restaurant theme
- Update item details including prices and descriptions
- Generate QR codes for quick menu access
- Responsive and user-friendly interface

## 💡 Use Case

QuickChoice is designed to streamline menu management in restaurants. Whether it's updating prices or customizing the look, restaurant managers can handle everything through one central platform. Customers can scan a QR code to instantly view the latest digital menu.

## 🛠️ Installation

1. **Download or clone the repository:**
   ```bash
   git clone https://github.com/AhmedTalbii/QuickChoice.git
   ```

2. **Install XAMPP** (if not already installed) from [https://www.apachefriends.org](https://www.apachefriends.org) and start the **Apache** and **MySQL** modules.

3. **Move the project folder:**
   Copy the `QuickChoice` folder into your XAMPP `htdocs` directory:
   ```
   /opt/lampp/htdocs/QuickChoice    (Linux)
   C:\xampp\htdocs\QuickChoice      (Windows)
   ```

4. **Import the database:**
   - Open `phpMyAdmin` (visit `http://localhost/phpmyadmin`)
   - Create a new database (e.g., `quickchoice`)
   - Import the `.sql` file located in the `db/` folder of the project into the newly created database

5. **Access the web app:**
   Open your browser and go to:
   ```
   http://localhost/QuickChoice/
   ```

## 🧰 Tech Stack

- **Frontend:** HTML, CSS, JavaScript (Vanilla)
- **Backend:** PHP (Native)
- **Database:** MySQL
- **Tools:** XAMPP, phpMyAdmin

## 👥 Collaboration

This project was developed by:
- [Ahmed Talbi](https://github.com/AhmedTalbii)
- [Khalfaoui Driss](https://github.com/KhalfaouiDriss)

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).
