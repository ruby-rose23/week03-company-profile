TeachPeak 

Introduction

A Company Profile Website contains information, platforms, and services about their business. Businesses need one because it helps them introduce their company online to gain clients, employees, and business partners. The purpose of the project is to let everyone know who's looking for a job, business partners, or general inquiries about the company. The project helps both the company and individuals find the exact field they need.

----

Objectives

- Built a multi-page company profile website using Laravel.
- Implemented MVC architecture with CompanyController and Blade views.
- Organized views into layouts, pages, and components following Laravel.
- Integrated Bootstrap and font awesome.

----

MVC Architecture

• What is MVC?

MVC or Modal View Controller is a software design pattern that separate an application to three parts. Model handles data and business logic, then view handles the user sees or in short the UI, and controller act as the bridge between model and view, processing a request and returning responses like this subject client server.

• Why Laravel uses MVC?

-Laravel uses MVC because it enforces a clean separation of concerns. Each layer has one responsibility, making the codebase easier to read, maintain, and scale.

• Advantages of MVC in software development.

-The advantage of MVC in software development, the code is more organized and easier to maintain it also views can be changed without touching business logic. Controllers and models are independently testable.


Include a simple diagram such as:

Browser
 │
 ▼
Route (web.php)
 │
 ▼
Controller (CompanyController.php)
 │
 ▼
Blade View (pages/services.blade.php
 │
 ▼
Response to Browser

-----

Laravel Routing

• What is Routing?

-Routing is a mechanism that maps an incoming HTTP request URL to a specific controller method or closure.
  
• Named Routes

-Named routes allow to generate URLs or redirects by a name instead of a hardcoded path.
  
• GET Requests

-The routes in this project use Route::get(), meaning they respond only to HTTP GET requests appropriate for pages that display content without submitting data.

• Route Definitions

-The routes definition are the actual line of code that tell Laravel what to do when a user visits a specific URL.

<img width="975" height="425" alt="image" src="https://github.com/user-attachments/assets/da5df4cf-f97d-42c7-a590-30eb397c5463" />

-------

Controllers

• Purpose of Controllers

-Controllers handle the logic between a route and a view. When a user visits a URL the route call the appropriate controller method, which processes any logic and returns a response l usually a rendered blade view.

• Benefits of Controllers

-The benefits of controllers one it keeps the routes file clean and minimal, two centralizes page logic in one place, three it makes it easy to pass data ti views, and four last it supports grouping related actions.

• Controller Methods

-Controller methods are the individual functions inside the controller class. Each method handles one specific page.
Include screenshots of CompanyController.php

------

Blade Templating Engine

• Blade Layouts

Blade Layouts is a layout that is a master template that defines the shared HTML structure such as head, navbar, and footer that used across all pages.

• Blade Components

Components are reusable partial views such as resources/views/components/navbar.blade.php and resources/views/components/footer.blade.php

• @extends

The @extends tells a child view to inherit a layout.

• @section

The @section defines a block of content in a child view that fills a @yield slot in the layout.

• @yield

The @yield is the layout it mark where child view content will be injected.

• @include

The @include pulls in a component or partial view. Used in app.blade.php to embed the navbar and footer.

<img width="975" height="593" alt="image" src="https://github.com/user-attachments/assets/fc12a273-d351-4f8d-9e14-bedf83fbfec3" />

-------


Laravel Folder Structure

• app/

The app/ folder is where the PHP code written. It's like the brain of the website. The company controller was inside the folder it's the file that decides what happens when someone visits a page.

• routes/

The routes/ is like a directory or a map of the website. Without routes, laravel wouldn't know where to send visitors.

• resources/

The resources/ is where everything the user sees stored. This folder contain blade html such as homepage, about, and services, also ccs and JavaScript files.

• public/

The public/ is the only folder the browser can directly access. When someone types the website URL it landed here first. It contains index.php which starts the whole laravel app, and where the photos stored in the photos/ folder.

• bootstrap/

The bootstrap folder starts up laravel everytime someone visits the website. The cache/ folder inside it stores shortcuts so tha app runs faster.

• config/

The config/ is the website setting panel. It has files like database.php, mail.php and app.php. These settings read their values from the .env file, which is the private credentials are stored.

----

Screenshots

• Home Page

<img width="975" height="593" alt="image" src="https://github.com/user-attachments/assets/a61cbfb2-bdb9-4669-b073-2f00aadfaedb" />

• About Page

<img width="975" height="604" alt="image" src="https://github.com/user-attachments/assets/ac9f3bed-ad71-4e3d-9b6f-b25576429c60" />
 
• Services Page

 <img width="975" height="599" alt="image" src="https://github.com/user-attachments/assets/cbb23381-921b-4609-b1f5-428978eb3c86" />

• Contact Page

 <img width="975" height="611" alt="image" src="https://github.com/user-attachments/assets/d899a6e5-bd3d-45fd-810b-e29e941c47f7" />

• Navigation Bar

 <img width="975" height="610" alt="image" src="https://github.com/user-attachments/assets/54143bbe-7a5c-4bbd-9e8b-db7d6b4646b0" />

• Footer

 <img width="975" height="596" alt="image" src="https://github.com/user-attachments/assets/2635f38f-f799-477a-aa28-403c00615bcd" />

• Route Definitions

 <img width="975" height="594" alt="image" src="https://github.com/user-attachments/assets/069400e0-5196-4f40-9c21-3ab5b602f760" />

• Controller

 <img width="975" height="599" alt="image" src="https://github.com/user-attachments/assets/78b5753e-de49-4fed-8c17-e1b84f8fd130" />

• Blade Layout

 <img width="975" height="593" alt="image" src="https://github.com/user-attachments/assets/2fc21d93-0a52-4736-9572-37e3cce4083a" />

--------

Problems Encountered

When I'm creating new Laravel project folder suddenly the PHP artisan serve are not working cause the composer are not detected, I tried lots of solution in PowerShell but the composer are still not detected but it's already intall in my laptop since I already use it from the last activity. Then while building the project, visiting a page like the abot or services sometimes returned a 404 "Page not found" error. This was confusing because the route looked correct in web.php. Also after adding font awesome icons throughout the pages, some icons appeared as blank boxes and not show up at all. The rest of the page looked fine, but certain icons like in contacts are invisible.

---------

Solutions

I tried several command in PowerShell delete and reinstall a file many times using prompt, then suddenly it works and start installing for more than 3hrs, then after it finished the php artisan serve the website are working perfectly. The 404 error was caused by the route are not being saved properly so I double check it run some route list in terminal to see all registered routes and see if they existed, and save the route properly and clear any cached routes that might be outdated. The icons have some coding error it doubles the code inside the contact so I remove the duplicate and save it and it work.

-------

Reflection

Building the TeachPeak company profile website using laravel was one of the most interesting projects, and I learned a lot about web development. Before this project, I had a basic understanding of how to design a website using HTML and CSS. For the first time, I designed a website using php. I had used php in past projects creating a shop website which is about crochet, but not like this it's easier to understand using the Laravel. This platform will help me in my upcoming projects in the future, especially for the next project which is the e-commers.

The most important thing I learned from this project is the MVC, which stands for Model View Controller. Before when I created projects all data, design, and logic were mixed and unorganized. This time with the use of MVC the project is more organized and easier to understand. The model handles the data. The controller handles the logic. The view handles what the user sees. I'm still learning how to properly use it, and writing and fixing code is now much easier because I know where folder and files to find it.

Separation of concerns is important because it keeps the code clean and manageable. In this project when the navbar needed to be updated I only had to edit one file. That change automatically reflected on all four pages because the layout includes it. The separation of concern makes the project more readable and it is easier to edit one file without affecting the other pages.

It's easy to understand how the routes, controllers, and views work together it's like this a client and a server where a data request is made and a data response is given. The route shows what's available inside the system. The controller receives the request, prepares for a response, and sends it out. The view shows the systems responses. Each layer does its job without interfering with the others.

MVC architecture supports both small and large enterprise systems, which is essential for companies like banks and e-commerce platforms. It enables collaboration among many developers, with clear roles for the model, controller, and view layers, efficiently managing databases, authentication, and diverse interfaces.

This project made me discover more about web development it helped me understand how to properly create a website and how to use Laravel. Laravel  Blade templating, and MVC structure make development faster, easier, cleaner, and more professional. I look forward to building more projects using this framework in the future, especially for the upcoming project that we need to build this sem which is the e-commerce.

-----

References

Bootstrap Team. (2024). Bootstrap 5.3 documentation. Bootstrap. https://getbootstrap.com/docs/5.3

Font Awesome. (2024). Font Awesome 6 documentation. Fonticons, Inc. https://fontawesome.com/docs

Laravel LLC. (2024). Laravel 11.x documentation. Laravel. https://laravel.com/docs/11.x

Mozilla Developer Network. (2024). MDN web docs: HTML, CSS, and JavaScript reference. Mozilla. https://developer.mozilla.org

Otwell, T. (2024). Laravel: The PHP framework for web artisans. Laravel LLC. https://laravel.com

PHP Group. (2024). PHP manual. PHP Documentation. https://www.php.net/manual/en/

