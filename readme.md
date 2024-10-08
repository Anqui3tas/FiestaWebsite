# Fiesta Online Web Template

This is a responsive, customizable website template designed for Fiesta Online enthusiasts or any similar gaming community. The template includes a class selection interface, full-size image display, parallax effects, and is optimized for mobile responsiveness.

## Features

- **Class Selection Interface**: Displays class icons in a row. Selecting a class icon reveals a detailed description and a full-size image.
- **Parallax Scrolling**: Subtle parallax effect for desktop and mobile that provides a smooth user experience without overbearing movement.
- **Mobile Friendly**: Fully responsive design, addressing issues like background images and horizontal scrolling on mobile devices.
- **Simple Customization**: Modify classes, images, and descriptions easily within the `.html` and `.css` files.
- **Optimized Media Display**: Full-width display of images when a class icon is selected, with neatly formatted text descriptions.

## Preview

![Website Screenshot](/readme_images/FiestaWebsite_repository-open-graph-template.png)

You can view the live website [here](https://fiesta.lanteacorp.com/).

## Getting Started

To use this template, follow the instructions below.

### Prerequisites

- Basic understanding of HTML and CSS.
- [Git](https://git-scm.com/) installed on your local machine.

### Installation

1. Clone this repository to your local machine:
   ```bash
   git clone https://github.com/Anqui3tas/FiestaWebsite.git

2. Navigate to the project folder:
   ```bash
   cd fiesta-online-template

3. Open `index.html` in your preferred code editor to start customizing.

## Customizing the Template

1. **Class Icons**: Add your own icons by replacing the existing ones in the `/img` folder.
   ![Class Icons Screenshot](readme_images/ClassIcons.png)
   
2. **Class Descriptions**: Update the text and images for each class in the `index.html` file.
   ![Class Descriptions Screenshot](readme_images/ClassDescriptions.png)
   
3. **Images**: Replace the main class images in the `/img` folder.
   ![Main Class Images Screenshot](readme_images/ClassSelection.png)
   
4. **Parallax Effect**: Modify the parallax effect speed and behavior in the `js/parallax.js` file if needed.

## Deployment

To deploy your own version of the template:

1. After customizing, host the files on any static web hosting service such as GitHub Pages, Netlify, or your own server.

## Deployment with Register.php script

1. Enable IIS in your windows features, be sure to turn on CGI under: Internet Information Services -> World Wide Web Services -> Application Development Features -> CGI

2. Download and extract the latest from php.net (I put mine in c:/php)

3. Download and extract the latest from https://github.com/microsoft/msphpsql (put them into the c:/php/ext folder)

4. rename/update your php.ini (remove production from file name)

5. add the below 2 items to your php.ini file: *note:* be sure to update your code to match the version you're using
   ```bash
   code extension=php_sqlsrv_83_ts_x64.dll
   code extension=php_pdo_sqlsrv_83_ts_x64.dll

6. Move the register.php into your IIS webroot folder (Mine was C:\inetpub\wwwroot)

7. Add a Module Mapping should look like:
   ![Module Mapping](readme_images/modulemapping.png)


8. *optional* use cloudflare tunnels to hide your IP, just direct it to: http://LANIP:80

9. Update connection information at top of the registration script to match your database setup.

## Issues

If you encounter any issues or have questions about the template, feel free to open a GitHub issue or contact me.

## License

This project is licensed under the MIT License. Feel free to use and modify the template for your own projects.

## Acknowledgements

This template was developed as part of a personal project to enhance the gaming experience for Fiesta Online players. Special thanks to the Fiesta Online community and everyone who provides feedback!