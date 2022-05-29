# Mini CRM

A small customer relation ship management using laravel and my sql

1. Basic Laravel Auth: ability to log in as administrator
2. Use database seeds to create first user with email admin@admin.com and password “password”
3. CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies and Employees.
4. Companies DB table consists of these fields: Name (required), email, logo (minimum 100×100), website
5. Employees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone
6. Use database migrations to create those schemas above
7. Store companies' logos in storage/app/public folder and make them accessible from public
8. Use basic Laravel resource controllers with default methods – index, create, store etc.
9. Use Laravel’s validation function, using Request classes
10. Use Laravel’s pagination for showing Companies/Employees list, 10 entries per page
11. Use Laravel make:auth as default Bootstrap-based design theme, but remove ability to register




# Screen Shot 

<img width="800" alt="screenshot-1" src="https://user-images.githubusercontent.com/106478729/170886808-18a7819e-23fb-48b1-83c7-316c5a89fcae.png">
<img width="800" alt="screenshot-2" src="https://user-images.githubusercontent.com/106478729/170886820-1af53bbd-23ad-4637-9474-9f971ea8fd35.png">
<img width="800" alt="screenshot-3" src="https://user-images.githubusercontent.com/106478729/170886821-ae1f59ca-be09-4302-b93a-1153167a8664.png">
