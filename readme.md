# Laravel Project

## Getting Started

Follow these steps to set up the project on your local machine:

### 1. Clone the Repository

First, you need to clone the repository to your local machine. Open your terminal or command prompt and run:

```bash
git clone https://github.com/m-1Ahmad/Ani-Blogs.git
cd Ani-Blogs
```
### 2. Install Composer Dependencies,
you need to install the necessary dependencies. Run the following command:

```bash
composer install
```
And for node_modules dependencies:

```bash
npm install
```
or if you're using Yarn else ignore it:

```bash
yarn install
```

### 3. Create .env File
The .env file contains environment-specific settings. You need to create one by copying the example file:

```bash
cp .env.example .env
```
After that, update the .env file with your own configuration (like database details, etc.).

### 4. Generate Application Key
To generate the application key for your Laravel project, run:

```bash
php artisan key:generate
```

### 5. Link Storage Directory
Since the /public/storage directory is ignored, you need to create a symbolic link to make it accessible from the public directory:

```bash
php artisan storage:link
```

### 6. Run Migrations
Run the following command to create the required database tables:

```bash
php artisan migrate
```

### 7. Start the Development Server
Finally, you can run the application using the built-in Laravel development server:

```bash
php artisan serve
```
Now, open your browser and go to http://localhost:8000 to access the project.
