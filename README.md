# LAB: PrestaShop Implementing CRUD

![Excel Image](https://user-images.githubusercontent.com/970858/63474771-d6734700-c469-11e9-83bb-9429da563909.png)

## Prestashop Project

## Step 1: Module Structure
1. **Directory and File**:
    - Start by creating a folder for your module inside the `/modules` directory in PrestaShop. The folder name should match the module name.
    - Inside that folder, create the main PHP file for the module with the same name as the folder.

   **Hint**: The name of the file and the class should match for PrestaShop to recognize your module.

## Step 2: Define the Module Class
1. **Base Class**:
    - The module class should extend a specific base class in PrestaShop that allows you to create modules.
    - Don’t forget the constructor, where you will set the module’s name, version, and description.

   **Tip**: The constructor must always call the parent class constructor to properly initialize the module’s properties.

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
        - At a minimum, include fields such as an ID (`id_customer`), a text integer (like `points`).
    - Use SQL to create the table when the module is installed.

2. **Drop the Table on Uninstallation**:
    - In the `uninstallDb()` method:
        - Define the SQL logic to drop the table when your module is uninstalled.