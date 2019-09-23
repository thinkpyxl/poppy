const createContent = ({ content, close }) => {
  const Content = document.createElement('div');
  const Close = document.createElement('div');
  const classes = `poppy__content`;
  const closeClasses = `poppy__close`;

  Close.addEventListener(
    'click',
    close
  );
  Close.classList = closeClasses;
  Content.classList = classes;
  Content.innerHTML = content;
  Content.appendChild(Close);

  return Content;
}

export default createContent;