# Challenge: Mars Rover

[![Codacy Badge](https://app.codacy.com/project/badge/Grade/582f9d0506b249c6a2366f1322e8f191)](https://www.codacy.com/gh/resultakak/hepsiburada-php-challenge/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=resultakak/hepsiburada-php-challenge&amp;utm_campaign=Badge_Grade)

Hepsiburada.com PHP Challenge: Mars Rover

A squad of robotic rovers are to be landed by NASA on a plateau on Mars. This plateau, which is curiously rectangular,
must be navigated by the rovers so that their on board cameras can get a complete view of the surrounding terrain to
send back to Earth. A rover's position and location is represented by a combination of x and y co-ordinates and a letter
representing one of the four cardinal compass points. The plateau is divided up into a grid to simplify navigation. An
example position might be 0, 0, N, which means the rover is in the bottom left corner and facing North. In order to
control a rover, NASA sends a simple string of letters. The possible letters are 'L', 'R' and 'M'. 'L' and 'R' makes the
rover spin 90 degrees left or right respectively, without moving from its current spot. 'M' means move forward one grid
point, and maintain the same heading. Assume that the square directly North from (x, y) is (x, y+1).

Create a Web API to create and manage rovers. Resources must be created and managed via RESTful endpoints.

See [Documentation](https://resul.me/hepsiburada-php-challenge/).

## Prerequisites

### Requirements

* PHP `>= 7.4.21`

### Install

```bash
composer install --no-dev
``` 

### Run

```bash
php -S 0.0.0.0:8080 -t public/
``` 

## Documentation

See [https://resul.me/hepsiburada-php-challenge/](https://resul.me/hepsiburada-php-challenge/).

