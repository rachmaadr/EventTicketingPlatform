## Repository Description

### Event Ticket Sales System with CMS, PDF Ticket Generation, and Barcode Scanning
### Registration Page Explanation
![Landing Page](landingPage.png)

Event Ticket Sales System with CMS, PDF Ticket Generation, and Barcode Scanning. Manage events, generate PDF tickets with unique barcodes, and validate tickets in real-time using SimpleSoftwareIO/simple-qrcode. Built with Laravel and Vue.js. Easy to install, configure, and use. Contributions welcome!

### Key Features

<div align="center">
  <table style="width:80%; border: 1px solid #ddd; border-collapse: collapse;">
    <thead>
      <tr>
        <th style="width:33%; padding: 10px; border: 1px solid #ddd;">Content Management System (CMS)</th>
        <th style="width:33%; padding: 10px; border: 1px solid #ddd;">PDF Ticket Generation</th>
        <th style="width:33%; padding: 10px; border: 1px solid #ddd;">Barcode Scanning</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="padding: 10px; border: 1px solid #ddd;">
            <ol>
                <li>Easily manage various types of events.</li>
                <li>Create, edit, and delete events.</li>
                <li>Set event details such as description, location, date, and time.</li>
            </ol>
        </td>
        <td style="padding: 10px; border: 1px solid #ddd;">
            <ol> 
                <li>Automatically generate tickets in PDF format.</li>
                <li>Input Type: Email</li>
                <li>Each ticket includes essential information such as event name, attendee details, and a unique barcode.</li>
            </ol>
        </td>
        <td style="padding: 10px; border: 1px solid #ddd;">
            <ol>
                <li>Validate tickets using barcode scanning.</li>
                <li>Scanning can be done via mobile applications or barcode scanning devices.</li>
                <li>A real-time validation process to ensure ticket authenticity.</li>
            </ol>
        </td>
      </tr>
    </tbody>
  </table>
</div>


### Technologies Used

- **Backend:** Laravel
- **Frontend:** Tailwind CSS
- **Database:** MySQL
- **Barcode:** SimpleSoftwareIO/simple-qrcode for barcode generation and scanning
- **PDF Generation:** DomPDF for Laravel
- **FakerPhP:** PHP library that generates fake data for you. Whether you need to bootstrap database.

  
### Skema Database

![Skema Database](ERD%20Ticketing-event.png)

### Registration Page Explanation
![Registrarion Page](loginPage.png)

The registration page is designed for administrators to create their accounts. Here are the key components and their purposes:

<div align="center">
  <table style="width:80%; border: 1px solid #ddd; border-collapse: collapse;">
    <thead>
      <tr>
        <th style="width:25%; padding: 10px; border: 1px solid #ddd;">Name Field</th>
        <th style="width:25%; padding: 10px; border: 1px solid #ddd;">Email Field</th>
        <th style="width:25%; padding: 10px; border: 1px solid #ddd;">Password Field</th>
        <th style="width:25%; padding: 10px; border: 1px solid #ddd;">Confirm Password Field</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
            <ol>
                <li>Label: "Name"</li>
                <li>Input Type: Text</li>
                <li>Description: <br>The administrator should enter their full name in this field. This will be used to personalize their experience and may be displayed in various parts of the application.</li>
            </ol>
        </td>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
            <ol> 
                <li>Label: "Email"</li>
                <li>Input Type: Email</li>
                <li>Description: <br>The administrator should enter a valid email address. This email will be used for account-related communications and to recover the password if needed.</li>
            </ol>
        </td>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
            <ol>
                <li>Label: "Password"</li>
                <li>Input Type: Password</li>
                <li>Description: <br>The administrator should create a strong password to secure their account. This password must meet the application's security requirements (e.g., minimum length, inclusion of special characters, etc.).</li>
            </ol>
        </td>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
            <ol>
                <li>Label: "Confirm Password"</li>
                <li>Input Type: Password</li>
                <li>Description: <br> The administrator should re-enter the same password as in the Password Field. This is to ensure that there are no typos in the password, providing an additional layer of confirmation.</li>
            </ol>
        </td>
      </tr>
    </tbody>
  </table>
</div>


### Admin Dashboard Section Overview
![Dashboard Page](dashboardPage.png)
<div align="center">
  <table style="width:80%; border: 1px solid #ddd; border-collapse: collapse;">
    <thead>
      <tr>
        <th style="width:50%; padding: 10px; border: 1px solid #ddd;">Table Columns</th>
        <th style="width:50%; padding: 10px; border: 1px solid #ddd;">Button</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <ol>
            <li>ID: Unique identifier for each entry.</li>
            <li>Name: Name of the entry (e.g., event or user).</li>
            <li>Category: Classification of the entry.</li>
            <li>Date: Relevant date for each entry.</li>
            <li>Duration: Period related to the entry.</li>
          </ol>
        </td>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <ol>
            <li>Transaction: View/manage transactions for the entry.</li>
            <li>Scan Ticket: Scan and validate tickets.</li>
            <li>Edit: Modify entry details.</li>
            <li>Delete: Remove the entry after confirmation.</li>
          </ol>
        </td>
      </tr>
    </tbody>
  </table>
</div>

### Admin Ticket Section Overview
![Ticket Page](ticketPage.png)
This description explains the function and use of each column in the ticket table in detail.
<div align="center">
  <table style="width:80%; border: 1px solid #ddd; border-collapse: collapse;">
    <thead>
      <tr>
        <th style="width:20%; padding: 10px; border: 1px solid #ddd;">ID</th>
        <th style="width:20%; padding: 10px; border: 1px solid #ddd;">Name</th>
        <th style="width:20%; padding: 10px; border: 1px solid #ddd;">Price</th>
        <th style="width:20%; padding: 10px; border: 1px solid #ddd;">Quantity</th>
        <th style="width:20%; padding: 10px; border: 1px solid #ddd;">Max</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <ol>
            <li>Unique identifier for each ticket.</li>
            <li>Used for tracking and managing tickets in the system.</li>
          </ol>
        </td>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <ol>
            <li>Name or title of the ticket.</li>
            <li>Provides a description of the event or product associated with the ticket.</li>
          </ol>
        </td>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <ol>
            <li>Cost of the ticket.</li>
            <li>Displayed to users as the price they need to pay to acquire the ticket.</li>
          </ol>
        </td>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <ol>
            <li>Number of tickets available for purchase.</li>
            <li>Helps manage and display ticket availability to users.</li>
          </ol>
        </td>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <ol>
            <li>Maximum number of tickets that can be purchased or issued.</li>
            <li>Enforces limits on ticket purchases to prevent overselling.</li>
          </ol>
        </td>
      </tr>
    </tbody>
  </table>
</div>

### Admin Transaction Approve Section Overview
![Transaction Page](transactionPage.png)
<div align="center">
  <table style="width:80%; border: 1px solid #ddd; border-collapse: collapse;">
    <thead>
      <tr>
        <th style="width:15%; padding: 10px; border: 1px solid #ddd;">ID</th>
        <th style="width:20%; padding: 10px; border: 1px solid #ddd;">Ticket Code</th>
        <th style="width:25%; padding: 10px; border: 1px solid #ddd;">Detail</th>
        <th style="width:15%; padding: 10px; border: 1px solid #ddd;">Status</th>
        <th style="width:15%; padding: 10px; border: 1px solid #ddd;">Total Price</th>
        <th style="width:10%; padding: 10px; border: 1px solid #ddd;">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <ul>
            <li>ID: Unique identifier for the transaction.</li>
            <li>Used for tracking and managing each transaction in the system.</li>
          </ul>
        </td>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <ul>
            <li>Ticket Code: Code assigned to the ticket.</li>
            <li>Used for validation and identification purposes.</li>
          </ul>
        </td>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <ul>
            <li>Detail: Information about the transaction.</li>
            <li>Includes details about the event or product purchased.</li>
          </ul>
        </td>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <ul>
            <li>Status: Current status of the transaction (e.g., Pending, Approved, Completed).</li>
            <li>Indicates the state of the transaction.</li>
          </ul>
        </td>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <ul>
            <li>Total Price: Total cost of the transaction.</li>
            <li>Displays the amount to be paid for the ticket(s) purchased.</li>
          </ul>
        </td>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <ul>
            <li><strong>Approve:</strong> Mark the transaction as approved and confirm the purchase.</li>
            <li><strong>Send via Email:</strong> Send transaction details and ticket information to the user's email.</li>
            <li><strong>Delete:</strong> Remove the transaction from the system after confirmation.</li>
          </ul>
        </td>
      </tr>
    </tbody>
  </table>
</div>

### Admin Scan Barcode Section Overview
![Scan Barcode](scanbarcode.png)
<div align="center">
  <table style="width:80%; border: 1px solid #ddd; border-collapse: collapse;">
    <thead>
      <tr>
        <th style="width:20%; padding: 10px; border: 1px solid #ddd;">Component</th>
        <th style="width:80%; padding: 10px; border: 1px solid #ddd;">Description</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <h3>Barcode Scanner Interface</h3>
        </td>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <p>Provides an interface for scanning barcodes using a connected scanner or mobile device camera. This tool enables quick validation of tickets by capturing and processing barcode data.</p>
        </td>
      </tr>
      <tr>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <h3>Ticket Input Field</h3>
        </td>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <p><strong>Label:</strong> "Ticket Code"</p>
          <p><strong>Input Type:</strong> Text</p>
          <p><strong>Description:</strong> Allows administrators to manually enter a ticket code if barcode scanning is not feasible. This field provides an alternative for verifying tickets when the scanner is unavailable or malfunctioning.</p>
        </td>
      </tr>
      <tr>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <h3>Scan Button</h3>
        </td>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <p><strong>Label:</strong> "Verify Ticket"</p>
          <p><strong>Function:</strong> Submits the scanned or entered ticket code for processing. It triggers the system to look up the ticket details and display the relevant information for validation.</p>
        </td>
      </tr>
      <tr>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <h3>Ticket Information Display</h3>
        </td>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <p>Displays detailed information about the ticket after scanning or entry. Includes:</p>
          <ul>
            <li><strong>Ticket ID:</strong> Unique identifier for the ticket.</li>
            <li><strong>Event Name:</strong> Name of the event associated with the ticket.</li>
            <li><strong>Attendee Name:</strong> Name of the person who holds the ticket.</li>
            <li><strong>Status:</strong> Current status of the ticket (e.g., Valid, Invalid, or Used).</li>
            <li><strong>Additional Details:</strong> Other relevant information about the ticket.</li>
          </ul>
        </td>
      </tr>
      <tr>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <h3>Error Handling</h3>
        </td>
        <td style="vertical-align:top; padding: 10px; border: 1px solid #ddd;">
          <p>Handles issues related to ticket scanning and validation:</p>
          <ul>
            <li><strong>Invalid Ticket:</strong> Displays an error message if the ticket code is not found or invalid.</li>
            <li><strong>Scanning Issues:</strong> Provides an error message and prompts for manual entry if there are problems with the barcode scanner.</li>
          </ul>
        </td>
      </tr>
    </tbody>
  </table>
</div>




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

  
### Contribution

I welcome contributions from developers interested in enhancing this system. Please open an issue or a pull request to get started.
