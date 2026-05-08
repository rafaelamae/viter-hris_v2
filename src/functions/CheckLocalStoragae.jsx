export const checkLocalStorage = () => {
  let hristoken = null;
  try {
    const token = localStorage.getItem("wfstoken");
    hristoken = token ? JSON.parse(token) : null;
  } catch (error) {
    hristoken = null;
  }
  return hristoken;
};
