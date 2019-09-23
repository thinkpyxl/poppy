const createPeek = (message, handler) => {
  const Peek = document.createElement('div');
  const Message = document.createElement('p');
  const classes = `poppy__peek`;

  Message.innerText = message;
  Peek.appendChild(Message);
  Peek.classList = classes;

  if (handler) {
    Peek.addEventListener(
      'click',
      handler,
    );
  }

  return Peek;
}

export default createPeek;