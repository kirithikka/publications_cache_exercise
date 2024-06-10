What libraries did you use? Why did you use them?

Guzzle Http Client: I have used Guzzle Http Client to make HTTP requests since it is more simple, readable, easy to maintain and more feature rich.

Laravel framework: I opted for Laravel framework since it's a powerful PHP framework that comes with many useful features, making development easier.

------------------------------------------------------------

If you had more time, what further improvements or new features would you add?

I would add the following if I had more time:
1. Authentication: I would enhance the security of the API by authenticating the users acccessing the API and also implement access control that allows only authorised users.
2. Input validation: Adding input validation for DOI to ensure the integrity of the data received.
3. Error handling: Providing more informative and user friendly error messages.
4. Caching strategy: I would optimise the caching strategy by considering expiring policies and cache invalidation policies.
5. Unit tests: Adding unit tests to ensure that the API works as expected
6. Documentation: Generating documentation using tools like Swagger.
7. Rate limiting: If required, I would implement rate limiting for the API to protect the API from high traffic.
8. Dockerise: Dockerising the application can help in deploying the application across different environments.
9. Implementing GitHub actions: To automate the tasks such as running tests, linting code, etc.

------------------------------------------------------------

Which parts are you most proud of? And why?

1. Clean code structure: The code follows coding principles like Single Responsibility, dependency injection, etc to promote readability, reusability and  easily scale it further. It also has a new config file(config/techtest.php) that allows to easily manage all the configs related to the application.

2. Deploying the API: The API is running smoothly on AWS EC2 and is available all the time.

------------------------------------------------------------

Which parts did you spend the most time with? What did you find most difficult?

CrossRef API: I spent a significant amount of time in understanding the differences between the full and the partial DOIs, as well as understanding the crossRef APIs that is required in the application
