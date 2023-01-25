# Random Password Generator API
This is a very dumb PHP-based API that aims to generate random passwords. 

The API accepts 4 parameters in the URL path:

| Parameter | Description |
| --- | --- |
| length | The length of the generated password `(default: 8)` |
| special | Whether to include special characters in the password `(default: false)` |
| numbers | Whether to include numbers in the password `(default: false)` |
| case | hether to make the password randomly case-sensitive `(default: false)` |

The values that parameters can be set to are true and false, except length (which is to be set to a number) !

Example usage:

```
http://localhost/PassGen.php/16/true/true/true
```

This will generate a 16 characters long password with special characters, case-sensitive and numbers.

Example output:

```
{"password":"aS7#KLmqpVxZJ1t6"}
```

## How does it work? (The sauce)
It uses the `$_SERVER['REQUEST_URI']` variable to get the parameters from the URL first following with the `explode()` function to split the request URL and `array_splice()` to remove the first parameter which is the name of the API. 

Then it checks if the other parameters are set and assigns default values if they are not.

It then concatenates possible characters based on the parameters passed, then it loops and uses the `rand()` function to generate random indexes of the `possible_chars` string, and it constructs the password. 

Finally it returns the password in a JSON format.

## How to use 
1. Clone the repo
2. Host it on a webserver
3. See above examples of usage for reference

## Prerequisites
- Built and tested on PHP 7.0.3
- A webserver of your choice to host it on 

### Disclaimer
Keep in mind that this is an assignment for school, `rand()` is not a cryptographically secure pseudorandom number generator *and therefore this password generator is not safe to use* !

The generator does have some bugs, for example: 
- Not being able to handle long password requests reliably or at all
- Sometimes doesn't generate the requested length
- Can sometimes freak out and not respond with anything 
