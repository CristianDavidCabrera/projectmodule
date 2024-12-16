# LAB: PrestaShop Implementing CRUD

![Excel Image](https://user-images.githubusercontent.com/970858/63474771-d6734700-c469-11e9-83bb-9429da563909.png)

## Introduction

In this lab, you will learn how to implement full CRUD (Create, Read, Update, Delete) functionality in a PrestaShop module. You will start by setting up the module structure, defining database tables, and then proceed to building a complete back-office interface for managing records. By the end of this lab, you will have developed a fully functional module that interacts with the database, allowing you to manage data from the PrestaShop back office through custom forms and operations.

## Initial Setup

### Requirements
Start by forking the provided GitHub repository to your account and then clone it locally. This will be your workspace for completing the lab exercises.

- [Learn how to fork this repo](https://guides.github.com/activities/forking/)
- Clone this repo into your `code/labs` folder


## Step 1: Fork the Repository
1. **Fork the Repository**:
   - Go to the original repository created for this lab on GitHub.
   - Click on the **Fork** button in the top-right corner to create a copy of the repository under your GitHub account.

   **Tip**: Forking allows you to work on your own version of the module without affecting the original repository.

## Step 2: Clone the Repository to Your Local Machine
1. **Clone the Forked Repository**:
   - Clone your forked repository into the PrestaShop `/modules` directory so that it is detected as a PrestaShop module.
   
   - Navigate to your PrestaShop installation directory:
     ```bash
     cd /path/to/your/prestashop/modules
     ```
   - Clone the repository into the `/modules` folder:
     ```bash
     git clone https://github.com/yourusername/mymodulecrud.git
     ```

   - Replace `yourusername` with your GitHub username and `mymodulecrud` with the repository name.

   **Tip**: Cloning the repository directly into the `/modules` directory allows PrestaShop to automatically detect the module.

## Step 3: Create the Module Structure
1. **Create the Module Folder and File**:
   - Create a folder called `mymodulecrud` inside `/modules`.
   - Inside that folder, create a file named `mymodulecrud.php`. This will be the main file of your module.

2. **Define the Module Class**:
   - Inside the `mymodulecrud.php` file, define a class that extends the base `Module` class.
   - In the **constructor** of the class, set the following details:
     - Module name.
     - Module version.
     - Module author.
     - Display name and description of the module.

3. **Installation and Uninstallation Methods**:
   - In the `install()` method:
     - Call the function to create the database table needed for the module.
   - In the `uninstall()` method:
     - Call the function to delete the database table when the module is uninstalled.

   **Hint**: You will need to define methods like `installDb()` and `uninstallDb()` to manage the database operations.

## Step 4: Define the Database Table
1. **Create a Table on Installation**:
   - In the `installDb()` method:
     - Define a table to store the records. 
     - At a minimum, include fields such as an ID (`id_crud`), a text field (like `name`), and a toggle switch (`gender`).
   - Use SQL to create the table when the module is installed.

2. **Drop the Table on Uninstallation**:
   - In the `uninstallDb()` method:
     - Define the SQL logic to drop the table when your module is uninstalled.

## Step 5: Define the ObjectModel
1. **Create a Model**:
   - Create a PHP file inside your module called `CrudModel.php` that extends `ObjectModel`.
   - In this file, define a class that will represent the table you created in the previous step.
   - Map the table columns to the model attributes, such as `id`, `name`, and `gender`.

   **Hint**: Use the `$definition` array in the class to define the structure of the model and map the fields to the database columns.

2. **CRUD Methods**:
   - Use the predefined methods of `ObjectModel` to perform the CRUD (Create, Read, Update, Delete) operations.
   - Implement methods like `add()`, `update()`, and `delete()` to interact with the database.

## Step 6: Create the Admin Interface for CRUD
1. **List Data in Admin**:
   - In your module, create a function to generate a list of records.
   - Configure the table to display the fields you defined in the model, such as `name` and `gender`.
   - Add edit and delete buttons next to each record.

   **Hint**: Use `getList()` from `ObjectModel` to retrieve the records from the database.

2. **Create a Form for Adding/Editing Records**:
   - Create a form in the back office using `HelperForm` that allows the user to add new records or edit existing ones.
   - The form should include:
     - A text input labeled **"Name"**.
     - A toggle switch for **"Gender"** (with values `Male` and `Female`).

   **Hint**: Use the `submit` method to handle form submissions, saving or updating records in the database.

3. **Delete Records**:
   - Add a delete button in the list of records to allow users to remove specific entries.
   - Handle record deletion using the `delete()` method of `ObjectModel`.

## Step 7: Test the CRUD
1. **Install the Module**:
   - Install the module from PrestaShop’s back office and verify that you can access the CRUD interface.
   - Test adding, editing, and deleting records to ensure the changes are reflected correctly in the database.

2. **Verify Database Changes**:
   - Check the database and ensure that each operation (add, edit, delete) is being correctly reflected.

## Step 8: Bonus - Custom SQL Queries
1. **Custom SQL Queries**:
   - If you need more complex operations, you can write custom SQL queries using PrestaShop’s `Db` class.
   - Implement queries like `SELECT`, `UPDATE`, and `DELETE` for more specific operations.

   **Hint**: Use `Db::getInstance()` to execute SQL queries.

## Step 9: Bonus - Sanitizing SQL Queries
1. **Why Sanitize**:
   - It’s crucial to protect your module from SQL injection attacks, so you should sanitize any user input before using it in SQL queries.

2. **How to Sanitize**:
   - Use PrestaShop’s `pSQL()` function to sanitize strings before inserting them into SQL queries.

   **Hint**: If you are using integers (such as an ID), make sure to validate them before using them in queries.

## Step 10: Commit and Push Your Changes
1. **Commit**:
   - Commit your changes after implementing the CRUD functionality:
     ```bash
     git add .
     git commit -m "Implemented CRUD functionality"
     ```

2. **Push to GitHub**:
   - Push your changes to your forked GitHub repository:
     ```bash
     git push origin main
     ```

## Step 11: Create a Pull Request (PR)
1. **Create the PR**:
   - Go to your repository on GitHub and click on the **Compare & pull request** button to create a Pull Request to the original repository.
   
2. **Describe Your Changes**:
   - In the PR description, explain the changes you made and how you implemented the CRUD functionality.

---

## Submission
Once you have completed your analysis and visualizations, push your Jupyter notebook to your forked GitHub repository. Ensure that your final submission includes narratives explaining your visualizations and insights.


```bash
$ git add .
$ git commit -m "done"
$ git push origin main
```

Then create a Pull Request!!

![happy_coding](https://user-images.githubusercontent.com/970858/63899010-c23fc480-c9ea-11e9-84a2-542907e42362.png)
