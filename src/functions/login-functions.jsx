import { devNavUrl, urlDeveloper } from "./functions-general";

export const checkRoleToRedirect = (navigate, data) => {
  const role = (data.role || data.role_name || urlDeveloper)
    .toLowerCase()
    .replaceAll(" ", "-");

  navigate(`${devNavUrl}/${data.role_name.toLowerCase()}/`);
};
