import { UrlAdmin, devNavUrl, urlDeveloper } from "../functions/functions-general";
import Dashboard from "../pages/developer/dashboard/Dashboard";
import Employees from "../pages/developer/employees/Employees";
import Memo from "../pages/developer/memo/Memo";
import Roles from "../pages/developer/settings/roles/Roles";
import Users from "../pages/developer/settings/users/Users";
import Department from "../pages/developer/settings/department/Department"; // NEW
import Notification from "../pages/developer/settings/notification/Notification";

const rolePaths = [urlDeveloper, UrlAdmin];

const createRoleRoutes = (rolePath) => [
  {
    path: `${devNavUrl}/${rolePath}/`,
    element: (
      <>
        <Dashboard />
      </>
    ),
  },
  {
    path: `${devNavUrl}/${rolePath}/dashboard`,
    element: (
      <>
        <Dashboard />
      </>
    ),
  },
  {
    path: `${devNavUrl}/${rolePath}/settings/users/roles`,
    element: (
      <>
        <Roles />
      </>
    ),
  },
  {
    path: `${devNavUrl}/${rolePath}/employees`,
    element: (
      <>
        <Employees />
      </>
    ),
  },
  {
    path: `${devNavUrl}/${rolePath}/settings/users`,
    element: (
      <>
        <Users />
      </>
    ),
  },
  {
    path: `${devNavUrl}/${rolePath}/memo`,
    element: (
      <>
        <Memo />
      </>
    ),
  },
  // NEW
  {
    path: `${devNavUrl}/${rolePath}/settings/department`,
    element: (
      <>
        <Department />
      </>
    ),
  },
  {
    path: `${devNavUrl}/${rolePath}/settings/notification`,
    element: (
      <>
        <Notification />
      </>
    ),
  },
];

export const routesDeveloper = rolePaths.flatMap(createRoleRoutes);
