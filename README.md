# pixel-minimap

## Keys:

QERTYUIOP and FGHJKLZ: Select color

space: Hide / show.  Important: We start up with minimap hidden.

+/-: Zoom the minimap

On first run, the script asks for template location. This is a folder with png images, 16 color with correct PZ palette, and templates.json, which lists them and assigns size and coordinates. This input stores in a cookie. You don't need to change the path in the script.

This folder by default has no subfolders. It can have subfolders, "images" and "templates", if you change:
var subfolders = true;

For the image palette, open any of the template png's in this folder and save the color palette from it.

Demo (old version)

![Demo](demo.png)

