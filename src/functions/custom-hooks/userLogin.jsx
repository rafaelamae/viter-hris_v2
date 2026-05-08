// import { checkLocalStorage } from "@/functions/CheckLocalStoragae";
// import { apiVersion } from "@/functions/functions-general";
// import { checkRoleToRedirect } from "@/functions/login-functions";
// import { setIsLogin } from "@/store/StoreAction";
// import { StoreContext } from "@/store/StoreContext";
import React from "react";
import { queryData } from "./queryData";
import { checkRoleToRedirect } from "../login-functions";
import { setIsLogin } from "../../store/StoreAction";
import { apiVersion } from "../functions-general";
import { checkLocalStorage } from "../CheckLocalStoragae";
import { StoreContext } from "../../store/StoreContext";

const userLogin = (navigate) => {
  const { store, dispatch } = React.useContext(StoreContext);
  const [loginLoading, setLoading] = React.useState(true);

  React.useEffect(() => {
    setLoading(true);
    const fetchLogin = async () => {
      try {
        const login = await queryData(`${apiVersion}/other-user/token`, "post", {
          token: checkLocalStorage().token,
        });

        if (typeof login === "undefined" || !login?.success) {
          localStorage.removeItem("wfstoken");
          setLoading(false);
          dispatch(setIsLogin(true));
          return;
        }

        checkRoleToRedirect(navigate, login.data);
      } catch (error) {
        localStorage.removeItem("wfstoken");
        setLoading(false);
        dispatch(setIsLogin(true));
      }
    };
    if (
      checkLocalStorage() !== null &&
      checkLocalStorage().token !== undefined
    ) {
      fetchLogin();
      dispatch(setIsLogin(false));
    } else {
      setLoading(false);
      dispatch(setIsLogin(true));
    }
  }, []);

  return { loginLoading };
};

export default userLogin;
