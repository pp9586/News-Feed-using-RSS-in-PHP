# **Online News Feed Using RSS**

## **Overview**
The **Online News Feed Using RSS** is a dynamic web application designed to streamline the process of accessing news updates. By leveraging **RSS technology**, users can subscribe to various news categories and receive updates on a unified platform. The application functions as a "personal newspaper," fetching and displaying news in reverse-chronological order.

---

## **Features**
- **Subscription-based Access**: Users can subscribe to specific news categories for free.
- **Customizable Categories**: Includes predefined categories like sports, politics, education, and more.
- **Aggregated News Feed**: Displays the latest news from multiple sources in one place.
- **User-friendly Interface**: Simple navigation with registration and login functionality.
- **Admin Module**: Admins can manage categories and content sources.
- **Real-time Updates**: Fetches new content automatically for subscribed categories.

---

## **Technologies Used**
- **Frontend**: HTML, CSS
- **Backend**: PHP
- **Database**: MySQL
- **Data Fetching**: RSS (Really Simple Syndication)

### **Server Requirements**
- **Operating System**: Windows XP or higher
- **Web Server**: Apache
- **PHP Version**: 5 or higher
- **MySQL Version**: 5 or higher

---

## **System Requirements**

### **Hardware**
- **Processor**: Pentium IV, 2 GHz
- **RAM**: 128 MB or higher
- **Hard Disk**: 40 GB or higher
- **Monitor**: SVGA Color Monitor
- **Keyboard**: Standard 105 Keys
- **Mouse**: Logitech Mouse

### **Software**
- **Operating System**: Windows XP or higher
- **Web Server**: Apache
- **Programming Language**: PHP
- **Database Management System**: MySQL

---

## **Installation Steps**
1. Download and install a local server environment (e.g., [XAMPP](https://www.apachefriends.org) or [WAMP](https://www.wampserver.com)).
2. Place the project folder in the `htdocs` directory.
3. Create a MySQL database named `news_feed`.
4. Import the provided SQL file (`database.sql`) into the `news_feed` database.
5. Update database credentials in the `conn.php` file:
   ```php
   $host = "localhost";
   $username = "root";
   $password = "";
   $database = "news_feed";

