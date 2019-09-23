import create from "./create/";

const poppy = () => {
  const { popups } = window.poppy;

  const activePopups = popups.map(popup => ({
    ...popup,
    element: create.popup(popup)
  }));

  activePopups.forEach(popup => document.body.appendChild(popup.element));
};

export default poppy;
