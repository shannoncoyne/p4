# p4

http://p4.chocopai.net

## About this project

This project is a simple implementation of the [pomodoro technique](http://en.wikipedia.org/wiki/Pomodoro_Technique). Although by this point I am very familiar with the spelling and pluralization of pomodoro (ahem, thank you Eloquent), I still have no idea how to pronounce it. It is Italian for tomato.

Users can sign up, log in, log out. They can also create new pomodori, view and use the ones they've created, edit/update, and delete as well. Users can only access their own pomodori, so this is a one-to-many relationship.

For more information, see the [project specification](http://www.dwa15.com/Projects/P4).

## Notes for the teaching team

This project's base functionality is complete. What's left at this point is for me to make it as not ugly as possible!

I also had some trouble implementing the pomodoro model with Eloquent due to the pluralization. While Eloquent is great at detecting many pluralization patterns in English, it didn't come with out of the box support for Italian words. So you will see references to the Tomato model, often connected to variables called $pomodoro or $pomodori.

I also think this project is a nice start, but I can envision this as so much more useful as a mobile app that triggers your phone to vibrate when you're done with a sprint/break. So that's what I have in mind for the future of this application.

## Resources

### Code Help

* DWA15 class notes
* [Dayle Rees](http://daylerees.com/trick-validation-within-models) for validation in models
* [PHPAcademy](https://www.youtube.com/watch?v=hYUf6u_txhk) for the 'remember me' login functionality in Laravel

### Packages and libraries

* [CodeSleeve/asset-pipeline](https://github.com/CodeSleeve/asset-pipeline) - great package for managing all my CSS and JS files.
* [jQuery Runner](https://github.com/jylauril/jquery-runner) - runner/stopwatch plug-in for jQuery that I used for the sprint implementation.
* [Twitter Bootstrap](http://www.getbootstrap.com)
* [jQuery](http://jquery.com/)
