# LNX Moonmoon Theme
A responsive theme for [moonmoon](http://moonmoon.org) feed aggregator.

## Features
* Responsive
* Clean and minimal
* Neat code
* Collapsible sidebar

## Requirements
* moonmoon stable version (v8.12) (built on v9.0.0rc3).

## Usage
Download the ZIP or tar.gz file of this repo and extract the `custom` folder into your moonmoon base directory, don't worry it won't replace or override any existing files.
Then modify `index.php` in the root folder of your moonmoon installation) so it defaults to `home` theme at around line 40. For example:

```sh
sed -i s/default/home/ index.php
```

You are ready to go.

## Demo
This theme is being used at [**lnx.web.id**](https://lnx.web.id).

## Screenshot
[![screenshot](https://raw.githubusercontent.com/arachvy/lnx/master/screenshot.gif "lnx.web.id")](https://lnx.web.id)

## Optional
* Change the logo with your own image.
* If you are not using English, add some strings to your language file, located in `app/l10n/`, here is an example in Indonesian language

```
;Home
Depan

;and
dan

;Some rights reserved.
Hak cipta milik para penulis aslinya.

;Our awesome planet
Planet kita tercinta

```
Make sure to add an empty line at the end of the file.

## Credit
Based on [codinfox-lanyon](https://github.com/codinfox/codinfox-lanyon) jekyll theme.
