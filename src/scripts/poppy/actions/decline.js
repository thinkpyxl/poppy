const { localStorage: storage } = window;

const dismiss = (popup, slug) => ({ currentTarget }) => {
  popup.classList.add('inactive');
  
  storage.setItem(`poppy_${slug}_response`, false);

  window.setTimeout(
    300,
    () => {
      popup.remove();
    }
  );
}

export default dismiss;