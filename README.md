## Repository Description

### Event Ticket Sales System with CMS, PDF Ticket Generation, and Barcode Scanning

Event Ticket Sales System with CMS, PDF Ticket Generation, and Barcode Scanning. Manage events, generate PDF tickets with unique barcodes, and validate tickets in real-time using SimpleSoftwareIO/simple-qrcode. Built with Laravel and Vue.js. Easy to install, configure, and use. Contributions welcome!

### Key Features

- **Content Management System (CMS):**
  - Easily manage various types of events.
  - Create, edit, and delete events.
  - Set event details such as description, location, date, and time.

- **PDF Ticket Generation:**
  - Automatically generate tickets in PDF format.
  - Each ticket includes essential information such as event name, attendee details, and a unique barcode.

- **Barcode Scanning:**
  - Validate tickets using barcode scanning.
  - Scanning can be done via mobile applications or barcode scanning devices.
  - A real-time validation process to ensure ticket authenticity.

### Technologies Used

- **Backend:** Laravel
- **Frontend:** Tailwind CSS
- **Database:** MySQL
- **Barcode:** SimpleSoftwareIO/simple-qrcode for barcode generation and scanning
- **PDF Generation:** DomPDF for Laravel

### Usage

1. **Installation:**
   - Clone this repository: `git clone https://github.com/username/event-ticket-system.git`
   - Navigate to the project directory: `cd event-ticket-system`
   - Install dependencies: `composer install` and `npm install`
   - Configure the `.env` file according to your database and application settings.
   - Migrate the database: `php artisan migrate`
   - Start the server: `php artisan serve`

2. **Event Management:**
   - Log in to the CMS and create a new event.
   - Enter all necessary event information.
   - Save the event, and the system will generate PDF tickets that are ready for distribution.

3. **Ticket Validation:**
   - Use a mobile application or barcode scanning device to scan tickets upon attendee arrival.
   - The system will validate the ticket and display its authenticity status in real-time.
  
### Skema Database

![Skema Database](ERD%20Ticketing-event.png)

### Contribution

I welcome contributions from developers interested in enhancing this system. Please open an issue or a pull request to get started.
