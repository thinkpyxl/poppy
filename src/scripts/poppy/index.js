import create from "./create/";
import state from "./state/";

const poppy = () => {
  const { popups } = window.poppy;

  const activePopups = popups.map(popup => ({
    ...popup,
    element: create.popup(popup),
    state: state.getState(popup),
  }));

  activePopups.forEach(popup => {
    if (popup.state.active) {
      document.body.appendChild(popup.element);
    }
  });
};

export default poppy;
